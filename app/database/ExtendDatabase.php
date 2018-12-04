<?php

/**
 * Created by PhpStorm.
 * User: Venaca
 * Date: 25.11.2017
 * Time: 10:55
 */

namespace Extend\Database;

use Nette;
use PDO;

class ExtendDatabase {

    private $database;

    /**
     * ExtendDatabase constructor.
     * @param $database
     */
    public function __construct(Nette\Database\Context $database) {
        $this->database = $database;
    }

    public function runProcedure($statement) {
//        var_dump($statement);
//        die();
        $count = $this->database->getConnection()->getPdo()->exec($statement);
        return $count;
    }

    public function imageSave(Nette\Http\FileUpload $image, $description, $idDecoration = NULL) {
        $pdo = $this->database->getConnection()->getPdo();

        $idScan = $this->database->query("select SEM2_SEQ_SCANS.NEXTVAL from DUAL")->fetch()["NEXTVAL"];

        $pdo->setAttribute($pdo::ATTR_AUTOCOMMIT, 0);

        $file = fopen($image->temporaryFile, "rb");
        $typ = $image->getContentType();
        if (!empty($idDecoration)) {
            $stmtScans = $pdo->prepare("INSERT INTO SEM2_SCANS (ID_SCAN, TYPE, DESCRIPTION, DECORATION_ID_DECORATION, IMAGE) 
        VALUES (?, ?, ?, ?, EMPTY_BLOB()) RETURNING IMAGE INTO ?");
            $stmtScans->bindParam(1, $idScan);
            $stmtScans->bindParam(2, $typ);
            $stmtScans->bindParam(3, $description);
            $stmtScans->bindParam(4, $idDecoration);
            $stmtScans->bindParam(5, $file, PDO::PARAM_LOB);
        } else {
            $stmtScans = $pdo->prepare("INSERT INTO SEM2_SCANS (ID_SCAN, TYPE, DESCRIPTION, IMAGE) 
        VALUES (?, ?, ?, EMPTY_BLOB()) RETURNING IMAGE INTO ?");
            $stmtScans->bindParam(1, $idScan);
            $stmtScans->bindParam(2, $typ);
            $stmtScans->bindParam(3, $description);
            $stmtScans->bindParam(4, $file, PDO::PARAM_LOB);
        }

        $pdo->beginTransaction();
        $stmtScans->execute();
        $pdo->commit();
        return $idScan;
    }

    public function getBookImagesE($idBook) {
        $pdo = $this->database->getConnection()->getPdo();
        $stmt = $pdo->prepare('select IMAGE from SEM2_SCANS WHERE ID_SCAN > 75');
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($res as $image) {
//            var_dump(base64_encode(stream_get_contents($image["IMAGE"])));
        }
    }

}
