<!DOCTYPE html>
<html>
    <head>
        <title>Thématiques</title>
        <link rel="stylesheet" href="css/thematique.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </head>
    <body>
        <h1>Vos centres d'intérêt</h1>
        <form action="insertion_them.php" method="POST">
            <label for="sport">Sport :</label>
            <input type="text" name="sport" id="sport" required>
            <br><br>
            <label for="auteur">Auteur :</label>
            <input type="text" name="auteur" id="auteur" required>
            <br><br>
            <label for="livre">Livre :</label>
            <input type="text" name="livre" id="livre" required>
            <br><br>
            <label for="film">Film :</label>
            <input type="text" name="film" id="film" required>
            <br><br>
            <label for="serie">Série :</label>
            <input type="text" name="serie" id="serie" required>
            <br><br>
            <label for="anime">Anime/Manga :</label>
            <input type="text" name="anime" id="anime" required>
            <br><br>
            <input type="submit" value="Envoyer">
        </form>

        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script>
            $(function () {
                // Configuration de l'autocomplétion pour chaque champ
                $("#sport").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "autocomplet/autocomplete_sports.php",
                            dataType: "json",
                            data: {
                                term: request.term
                            },
                            success: function (data) {
                                var filteredOptions = $.grep(data, function (value) {
                                    return value.toLowerCase().indexOf(request.term.toLowerCase()) !== -1;
                                });
                                response(filteredOptions);
                            }
                        });
                    }
                });

                $("#auteur").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "autocomplet/autocomplete_auteurs.php",
                            dataType: "json",
                            data: {
                                term: request.term
                            },
                            success: function (data) {
                                var filteredOptions = $.grep(data, function (value) {
                                    return value.toLowerCase().indexOf(request.term.toLowerCase()) !== -1;
                                });
                                response(filteredOptions);
                            }
                        });
                    }
                });

                $("#livre").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "autocomplet/autocomplete_livres.php",
                            dataType: "json",
                            data: {
                                term: request.term
                            },
                            success: function (data) {
                                var filteredOptions = $.grep(data, function (value) {
                                    return value.toLowerCase().indexOf(request.term.toLowerCase()) !== -1;
                                });
                                response(filteredOptions);
                            }
                        });
                    }
                });

                $("#film").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "autocomplet/autocomplete_films.php",
                            dataType: "json",
                            data: {
                                term: request.term
                            },
                            success: function (data) {
                                var filteredOptions = $.grep(data, function (value) {
                                    return value.toLowerCase().indexOf(request.term.toLowerCase()) !== -1;
                                });
                                response(filteredOptions);
                            }
                        });
                    }
                });

                $("#serie").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "autocomplet/autocomplete_series.php",
                            dataType: "json",
                            data: {
                                term: request.term
                            },
                            success: function (data) {
                                var filteredOptions = $.grep(data, function (value) {
                                    return value.toLowerCase().indexOf(request.term.toLowerCase()) !== -1;
                                });
                                response(filteredOptions);
                            }
                        });
                    }
                });

                $("#anime").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "autocomplet/autocomplete_animes.php",
                            dataType: "json",
                            data: {
                                term: request.term
                            },
                            success: function (data) {
                                var filteredOptions = $.grep(data, function (value) {
                                    return value.toLowerCase().indexOf(request.term.toLowerCase()) !== -1;
                                });
                                response(filteredOptions);
                            }
                        });
                    }
                });
            });



        </script>
    </body>
</html>
