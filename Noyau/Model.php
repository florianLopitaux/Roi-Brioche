<?php

class Model
{
    private $_A_config;
    private $_O_connexion;
    private $BASE_DE_DONNEES = 'roibrioche_bd';

    /**
     * Constructor de la class
     *
     */
    public function __construct()
    {
        $this->_A_config = parse_ini_file("connexion.ini", true);
        echo "eded";
        if (is_array($this->_A_config)) {
            $S_dsn = $this->_A_config['type'] . ':dbname=' . $this->BASE_DE_DONNEES . ';host=' . $this->_A_config['adresse_IP'];
            $this->_O_connexion = new PDO($S_dsn, $this->_A_config['utilisateur'], $this->_A_config['motdepasse']);
        }
    }

    /**
     * Avoir la connexion à la base de données.
     *
     * @return PDO
     */
    public function getOConnexion(): PDO
    {
        return $this->_O_connexion;
    }
}