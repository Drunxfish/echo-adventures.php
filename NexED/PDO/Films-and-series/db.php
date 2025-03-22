<?php

// PDO in OOP, for better visibility
class Database
{
    public $pdo;

    // Constructor to initialize the PDO connection
    public function __construct($db = "netland", $user = "root", $pwd = "", $host = "127.0.0.1:3306", $charset = "utf8mb4")
    {
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        // Initialize the PDO connection
        try {
            $this->pdo = new PDO($dsn, $user, $pwd, $options);
        } catch (PDOException $e) {
        }
    }

    // runs (prepared) queries, but faster
    public function run($sql, $plcd = null)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($plcd);
        return $stmt;
    }

    // Select series
    public function selectSeries($serieID = null, $sort = false, $ord = false, $title = false, $titleDesc = false)
    {
        $qry = "SELECT * FROM media WHERE soortmedia = 'serie'";
        $orderBy = match (true) {
            $title => "ORDER BY titel ASC",
            $titleDesc => "ORDER BY titel DESC",
            $sort => "ORDER BY rating DESC",
            $ord => "ORDER BY rating ASC",
            default => ""
        };

        if ($orderBy) {
            $qry .= " " . $orderBy;
        }
        if ($serieID === null) {
            return $this->run($qry)->fetchAll();
        } else {
            return $this->run($qry . " AND id = ?", [$serieID])->fetch();
        }
    }

    // Select films
    public function selectFilms($filmID = null, $filmASC = false, $filmDESC = false, $duurASC = false, $duurDESC = false)
    {
        if ($filmASC) {
            return $this->run("SELECT * FROM media WHERE soortmedia = 'film' ORDER BY titel ASC")->fetchAll();
        } elseif ($filmDESC) {
            return $this->run("SELECT * FROM media WHERE soortmedia = 'film' ORDER BY titel DESC")->fetchAll();
        } elseif ($duurASC) {
            return $this->run("SELECT * FROM media WHERE soortmedia = 'film' ORDER BY duur ASC")->fetchAll();
        } elseif ($duurDESC) {
            return $this->run("SELECT * FROM media WHERE soortmedia = 'film' ORDER BY duur DESC")->fetchAll();
        } elseif ($filmID == null) {
            return $this->run("SELECT * FROM media WHERE soortmedia = 'film'")->fetchAll();
        } else {
            return $this->run("SELECT * FROM movies WHERE id = ?", [$filmID])->fetch();
        }
    }

    // Insert media
    public function insertMedia(
        $titel,
        $rating = null,
        $omschrijving = null,
        $awards = null,
        $duur = null,
        $datum = null,
        $seizoen = null,
        $land = null,
        $ytID = null,
        $media = null
    ) {
        $stmt = $this->pdo->prepare("INSERT INTO media (titel, rating, omschrijving, awards, duur, releasedatum, seizoenen, land, youtubetrailer, soortmedia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if ($duur == null || $duur == "") {
            $duur = null;
        }

        if ($seizoen == null || $seizoen == "") {
            $seizoen = null;
        }

        if ($awards == null || $awards == "") {
            $awards = null;
        }

        $plcd = [$titel, $rating, $omschrijving, $awards, $duur, $datum, $seizoen, $land, $ytID, $media];
        $stmt->execute($plcd);

        return $stmt->rowCount() > 0;
    }

    // Edit media
    public function editMedia(
        $id = null,
        $titel = null,
        $rating = null,
        $omschrijving = null,
        $awards = null,
        $duur = null,
        $datum = null,
        $seizoen = null,
        $land = null,
        $ytID = null,
        $media = null
    ) {
        $stmt = $this->pdo->prepare("UPDATE media SET titel = ?, rating = ?, omschrijving = ?, awards = ?, duur = ?, releasedatum = ?, seizoenen = ?, land = ?, youtubetrailer = ?, soortmedia = ? WHERE id = ?");

        if ($duur == null || $duur == "") {
            $duur = null;
        }

        if ($seizoen == null || $seizoen == "") {
            $seizoen = null;
        }

        if ($awards == null || $awards == "") {
            $awards = null;
        }

        $plcd = [$titel, $rating, $omschrijving, $awards, $duur, $datum, $seizoen, $land, $ytID, $media, $id];
        $stmt->execute($plcd);

        return $stmt->rowCount() > 0;
    }

    // Select media
    public function selectMedia($id = null)
    {
        if ($id == null) {
            return $this->run("SELECT * FROM media")->fetchAll();
        }

        return $this->run("SELECT * FROM media WHERE id = ?", [$id])->fetch();
    }

    // Log user by username
    public function logUser($username)
    {
        return $this->run("SELECT * FROM gebruikers WHERE username = ?", [$username])->fetch();
    }
}

// PDO object instance
$DB = new Database();
?>