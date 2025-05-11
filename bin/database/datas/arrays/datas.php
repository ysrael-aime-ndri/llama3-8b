<?php

namespace Epaphrodites\database\datas\arrays;

class datas
{

    /**
     * users Group list
     * 
     * @param int|string|null $key
     * @param string $need
     * @return array|int|string|null
     */
    public function usersGroup(
        int|string|null $key = null,
        string $need = '_id'
    ): array|int|string|null
    {

        $list = [
            1 => [ '_id' => 1, 'label' => 'SUPER ADMINISTRATOR' ],
            2 => [ '_id' => 2, 'label' => 'ADMINISTRATOR' ],
            3 => [ '_id' => 3, 'label' => 'USERS' ],
        ];

        return $this->returnData($list, $key, $need );
    }

    /**
     * Get the list of dashboard colors or a specific color property by key.
     *
     * @param string|int|null $key The index of the color to retrieve (null to return the full list).
     * @param string $property The property to return ('_id' or 'label', defaults to '_id').
     * @return array{_id: string, label: string[]|string|null}
     */
    public function colorsList(
        string|int|null $key = null,
        string $need = '_id'
    ): array|string|null {

        $list = [
            ['_id' => 'main', 'label' => 'Main Colors'],
            ['_id' => 'noella', 'label' => 'Noella Colors'],
            ['_id' => 'shlomo', 'label' => 'Shlomo Colors'],
            ['_id' => 'yedidia', 'label' => 'Yedidiah Colors'],
            ['_id' => 'eklou', 'label' => 'Eklou Colors'],
        ];

        return $this->returnData($list, $key, $need );
    }

    /**
     * Bot instructions
     * 
     * @param string $lang
     * @param string $botName
     * @return string
     */
/**
 * Génère les instructions formatées pour le bot Ollama
 * 
 * @param string $lang Langue des instructions (fr, en, etc.)
 * @param string $botName Nom du bot assistant
 * @return string Instructions formatées
 */
public function botInstructions(string $lang, string $botName): string
{
    // Configuration des sections d'instructions par langue
    $sections = [
        'fr' => [
            'presentation' => [
                "# Instructions pour $botName",
                "",
                "## À propos",
                "Tu es $botName, un assistant.",
                "Tu es de nationalite ivoirienne",
                "Tu reside en cote d'ivoire",
                "Ton ethnie est baoulé",
                "Tu dois toujours être serviable, précis et concis dans tes réponses.",
                "",
                "## À propos d'Epaphrodites",
                "Epaphrodites est un framework multi-langage (PHP, Python, C) conçu pour :",
                "- La performance : optimisé pour des applications rapides et efficaces",
                "- La modularité : architecture flexible permettant d'ajouter/supprimer des composants",
                "- La simplicité : courbe d'apprentissage rapide pour les développeurs",
                "",
                "Ce framework est idéal pour développer des applications web modernes et évolutives."
            ],
            'installation' => [
                "## Procédure d'installation",
                "",
                "1. Créer un nouveau projet :",
                "   ```bash",
                "   composer create-project epaphrodites/epaphrodites nom_de_votre_projet",
                "   ```",
                "",
                "2. Se positionner dans le répertoire du projet :",
                "   ```bash",
                "   cd nom_de_votre_projet",
                "   ```",
                "",
                "3. Mettre à jour les dépendances :",
                "   ```bash",
                "   composer update",
                "   ```",
                "",
                "4. Régénérer l'autoloader :",
                "   ```bash",
                "   composer dump-autoload",
                "   ```",
                "",
                "5. Lancer le serveur de développement local :",
                "   ```bash",
                "   php heredia run:server --port=8000",
                "   ```",
                "",
                "Une fois ces étapes terminées, l'application sera accessible à l'adresse http://localhost:8000"
            ],
            'creation_controleur' => [
                "## Création d'un contrôleur",
                "",
                "Pour générer un nouveau contrôleur, exécuter la commande :",
                "```bash",
                "php heredia create:controller MonControleur",
                "```",
                "",
                "Le fichier de contrôleur sera généré dans :",
                "```",
                "bin/controlleurs/controlleurs/MonControleur.php",
                "```",
                "",
                "### Structure d'un contrôleur",
                "Un contrôleur Epaphrodites contient des méthodes qui définissent les actions disponibles pour les routes.",
                "Exemple :",
                "```php",
                "public function indexAction()",
                "{",
                "    // Logique du contrôleur",
                "    return this->render('vue/index');",
                "}",
                "```"
            ],
            'routage' => [
                "## Configuration des routes",
                "",
                "Les routes sont définies dans le fichier de configuration :",
                "```",
                "config/routes.php",
                "```",
                "",
                "Exemple de définition d'une route :",
                "```php",
                "return [",
                "    'accueil' => [",
                "        'controller' => 'MonControleur',",
                "        'action' => 'index',",
                "        'method' => 'GET'",
                "    ]",
                "];",
                "```",
                "",
                "Pour accéder à cette route : http://localhost:8000/accueil"
            ],
            'bases_donnees' => [
                "## Utilisation des bases de données",
                "",
                "Epaphrodites supporte plusieurs systèmes de gestion de bases de données :",
                "- MySQL/MariaDB",
                "- PostgreSQL",
                "- SQLite",
                "",
                "### Configuration",
                "Les paramètres de connexion sont définis dans :",
                "```",
                "config/database.php",
                "```",
                "",
                "### Exemple d'utilisation",
                "```php",
                "// Dans un contrôleur",
                "public function getUsersAction()",
                "{",
                "    db = this->getDatabase();",
                "    users = db->query('SELECT * FROM users');",
                "    ",
                "    return this->json(users);",
                "}",
                "```"
            ]
        ],
        'en' => [
            // English sections would be defined here similarly
            // This is just a placeholder - implement full English translations as needed
        ]
    ];

    // Construction du message formaté
    $content = [];
    foreach ($sections['fr'] as $section) {
        $content[] = implode("\n", $section);
    }

    return implode("\n\n", $content);
}
    
      
    /**
     * Authorization actions
     *
     * @return array
     */
    public function autorisation(): array {

        return [
            1 => 'DENY',
            2 => 'ALLOW',
        ];
    }

    /**
     * Validation actions for users
     * 
     * @return array
     */
    public function ActionsUsers():array
    {

       return
            [
                1 => "ENABLE / DISABLE AN ACCOUNT",
                2 => "RESET PASSWORD",
                3 => "UPDATE GROUP",
            ];
    }   
    
    /**
     * Rights actions
     * 
     * @return array
     */
    public function ActionsRights():array
    {
       return
            [
                1 => "GRANT PERMISSION",
                2 => "DENY PERMISSION",
                3 => "DELETE RIGHT",
            ];
    }  
    
    /**
     * Set users colors
     * 
     * @return array
     */
    public function colorsActions():array
    {
       return
            [
                1 => "SET USERS GROUP COLOR"
            ];
    }  
    
    /**
     * Summary of returnData
     * 
     * @param array $list
     * @param int|string|null $key
     * @param string $need
     * @return array|int|string|null
     */
    private function returnData( 
        array $list = [],
        int|string|null $key = null,
        string $need = '_id'
    ): array|int|string|null{

        if ($key === null) {
            return array_values($list);
        }

        if (!isset($list[$key])) {
            return null;
        }

        return $list[$key][$need] ?? null;
    }
}