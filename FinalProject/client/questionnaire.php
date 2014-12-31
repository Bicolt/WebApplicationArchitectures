<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="questionnaire filtering client">
    <meta name="author" content="Nicolas Benning">
    <link href="../css/bootstrap/css/bootstrap.css" rel="stylesheet">
    <title>Nicolas Benning's Web App Project</title>
</head>
<body>
<div class='container' style='padding-top: 30px'>
    <div class='hero-unit'>
        <h1>Questionnaire browsing</h1>
        <p>Please wait for complete loading of the page before using it.</p>
    </div>
    <div class="row">
        <div id="questionnaire" class="container">
            <table>
                <tr>
                    <td>Filter by nationality:</td>
                    <td>Filter by lecturer:</td>
                    <td>Filter by course:</td>
                    <td>Filter by task:</td>
                    <td>Filter by student:</td>
                </tr>
                <tr>
                    <td><select id="nationalities"></select></td>
                    <td><select id="lecturers"></select></td>
                    <td><select id="courses"></select></td>
                    <td><select id="tasks"></select></td>
                    <td><select id="students"></select></td>
                </tr>
            </table>
            <input type="submit" id="submit" class="btn" value="Submit"><br/><br/>
            <table id="resultsTable" class="table table-bordered"></table>
        </div>
    </div>
</div>
<script type="text/javascript" src="lib/jquery.js"></script>
<script type="text/javascript" src="lib/questionnaire.js"></script>
</body>
</html>
