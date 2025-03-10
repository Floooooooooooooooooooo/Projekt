    <?php
        // PHP-Code: Auslesen der Parameter
        // Alle Variablen in PHP beginnen mit einem Dollarzeichen

        // Überprüfe ob die Parameter email und password übergeben wurden 
        if (!isset($_REQUEST['email']) || !isset($_REQUEST['password'])) {
            echo "Bitte geben Sie Email und Passwort ein!";
            exit;
        }


        // $_POST ist ein Array, das alle Parameter enthält, die per POST übergeben wurden
        // $_GET ist ein Array, das alle Parameter enthält, die per GET übergeben wurden
        // $_REQUEST ist ein Array, das alle Parameter enthält, die per POST oder GET übergeben wurden
        $email = $_REQUEST['email'];
        $passwd = $_REQUEST['password'];

        // Überprüfe ob die Parameter leer sind
        if (empty($email) || empty($passwd)) {
            echo "Bitte geben Sie Email und Passwort ein!";
            exit;
        }

        // Verbindung zur Datenbank herstellen
        $connection = new mysqli("localhost", "root", "root", "login");
        // Überprüfen ob die Verbindung erfolgreich war
        if ($connection->connect_error) {
            // . ist der Concat Operator in PHP, wie das + in JAVA
            die("Verbindung zur Datenbank fehlgeschlagen: " . $connection->connect_error);
        }

        // SQL-Query: prepare() bereitet das Statment vor
        //                      ? sind Platzhalter für die Parameter
        $sql = "INSERT INTO login (email, password) VALUES (?, ?)";
        $stmt = $connection->prepare($sql);
        // bind_param() bindet die Parameter an die Platzhalter
        // Datentypen: s = string, i = integer, d = double, b = blob
        $stmt->bind_param("ss", $email, $passwd);
        // execute() führt das Statement aus
        $stmt->execute();
        // check the success of the query
        if ($stmt->affected_rows == 1) {
            header("Location: successNewsletter.php");
        } else {
            header("Location: errorNewsletter.php");
        }
        // get the ID of the last inserted user
        $id = $stmt->insert_id;
        // Schließe Datenbankverbindung und statement
        $stmt->close();
        $connection->close();

        // Alles was wir mit echo ausgeben kommt in die Antwort des Servers
        echo "Erfolgreich eingefügt! <br>";
        echo "ID: $id <br>";
        echo "USERNAME: $email <br>";
        echo "PASSWORD: $passwd <br>";

    ?>
