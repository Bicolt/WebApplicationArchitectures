    var Data = {
        nationalities: {},
        lecturers: {},
        courses: {},
        tasks: {},
        students: {}
    };
    var Constants = {
        nbTables: 5,
        loadedTables: 0
    };
    var Results = {
        questionnaire : {}
    };

    function initQuestionnaireTable() {
        var table = document.getElementById("resultsTable");

        var headerline = Results.questionnaire[0];
        var firstline = document.createElement("tr");
        for (var k1 in headerline) {
            var newheader = document.createElement("th");
            newheader.innerHTML = k1;
            firstline.appendChild(newheader);
        }
        table.appendChild(firstline);

        for (var k2 in Results.questionnaire) {
            var newline = document.createElement("tr");
            var line = Results.questionnaire[k2];
            for (var l in line) {
                var newcolumn = document.createElement("td");
                newcolumn.innerHTML = line[l];
                newline.appendChild(newcolumn);
            }
            table.appendChild(newline);
        }
    }

    function initValues(select, table, idname, field) {
        var opt = document.createElement("option");
        opt.value = "none";
        opt.innerHTML = "none";
        select.appendChild(opt);
        for (var k in table) {
            var temp = document.createElement("option"),
                id = table[k][idname];
                val = table[k][field];
            temp.value = id;
            temp.innerHTML = val;
            select.appendChild(temp);
        }
    }

    function initDropdownLists() {
        initValues(document.getElementById("nationalities"), Data.nationalities, "id", "description");
        initValues(document.getElementById("lecturers"), Data.lecturers, "id", "name");
        initValues(document.getElementById("courses"), Data.courses, "id_course", "description");
        initValues(document.getElementById("tasks"), Data.tasks, "task_id", "task_id");
        initValues(document.getElementById("students"), Data.students, "student_number", "student_number");
    }

    function filterQuest() {
        document.getElementById("resultsTable").innerHTML = "";

        var n = document.getElementById("nationalities").value,
            l = document.getElementById("lecturers").value,
            c = document.getElementById("courses").value,
            t = document.getElementById("tasks").value,
            s = document.getElementById("students").value;

        var url = "../APIv1/app/index.php/questionnaire/search?";

        if (n != "none")
            url += "nationality_id=" + n;

        if (l != "none")
            url += "&lecturer_id=" + l;

        if (c != "none")
            url += "&course_id=" + c;

        if (t != "none")
            url += "&task_id=" + t;

        if (s != "none")
            url += "&student_id=" + s;

        $.get(url, function (data) {
            Results['questionnaire'] = data;
            document.getElementById("resultsTable").innerHTML = "";
            initQuestionnaireTable();
        }, "json");
    }


    function displayQuestionnaire() {
        initQuestionnaireTable();
        initDropdownLists();
        document.getElementById("submit").addEventListener("click", filterQuest, false);
    }

    function initData(fullPath, tableName) {
        $.get(fullPath, function (data) {
            Data[tableName] = data;
            Constants.loadedTables++;
            if (Constants.loadedTables == Constants.nbTables)
                $.get("../APIv1/app/index.php/questionnaire/search", function (data) {
                    Results['questionnaire'] = data;
                    displayQuestionnaire();
                }, "json");

        }, "json");
    }

    function loadData() {
        var basePath = "../APIv1/app/index.php/";
        Constants.loadedTables = 0;
        for (var tableName in Data) {
            var fullPath = basePath + tableName;
            initData(fullPath, tableName);
        }
    }

    function initialize() {
        loadData();
    }

    initialize();
