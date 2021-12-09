<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>
<style>
    .bg1 {
        background-color: red;
    }

    .bg2 {
        background-color: green;
    }

    .bg3 {
        background-color: rgb(255, 230, 0);
        width: 200px;
        height: 1270px;
        float: left;
    }

    .bg4 {
        background-color: darkkhaki;
        text-align: center;
        width: 80%
    }
</style>

<body>
    <div class="container">
        <img src="4JKcat.jpgss"
            class="img-fluid" alt="..." width="80%">
        <div class="container">
            <div class="col-12 bg3">[Float:left]</div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="แมนคูณ.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">แมวพันธุ์ เมนคูน ถือเป็นแมวสายพันธุ์ขนยาวที่มีต้นกำเนิดจากการผสมข้ามพันธุ์ของแมวพื้นเมือง กับแมวป่าทางตอนเหนือของประเทศสหรัฐอเมริกา ซึ่งคำว่า “เมน” มาจากถิ่นกำเนิดคืออยู่ที่รัฐ Maine ประเทศสหรัฐอเมริกา ส่วนคำว่า “คูน” เชื่อกันว่าอาจมาจากพวกมันที่มีลักษณะคล้ายกับตัวแรคคูน คือ มีหางเป็นพวง มีสีและลวดลายสีน้ำตาลที่มีลักษณะเหมือนแรคคูน</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="เปอเซีย.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">เปอร์เซีย เป็นแมวที่มีถิ่นกำเนิดอยู่ในแถบเปอร์เซีย หรืออิหร่าน ถูกนำไปเลี้ยงในประเทศต่าง ๆ ทั้งใน ยุโรปและอเมริกาเป็นเวลาเกือบร้อยปีมาแล้ว สำหรับประเทศไทยจัดเป็นแมวต่างประเทศ พันธุ์แรกที่ถูกนำมาเผยแพร่ เนื่องจากเป็นแมวที่มีอุปนิสัยอ่อนโยน สุขุมเข้ากับคนง่าย
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <button id="btnBack"> back </button>

                <div id="main">
                    <table  class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                            </tr>
                        </thead>
                        <tbody id="tblPost">
                        </tbody>
                    </table>
                </div>

                <div id="detail">
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>UserID</th>
                            </tr>
                        </thead>
                        <tbody id="tblDetails">
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-12 bg4">
                <p>63124101</p>
                <p>นายณัฐชนน เจียรมาศ</p>
            </div>
        </div>
    </div>
</body>
<script>
    function showDetails(id) {
        $("#main").hide();
        $("#detail").show();

        // console.log(id);
        var url = "https://jsonplaceholder.typicode.com/posts/" + id

        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line = "<tr id='detailROW'";
                line += "><td>" + data.id + "</td>"
                line += "<td><b>" + data.title + "</b><br/>"
                line += data.body + "</td>"
                line += "<td>" + data.userId + "</td>"
                line += "</tr>";
                $("#tblDetails").append(line);
            })
            .fail((xhr, err, status) => {

            })


    }

    function LoadPosts() {
        var url = "https://jsonplaceholder.typicode.com/posts"
        var i = 0;
        $.getJSON(url)
            .done((data) => {
                $.each(data, (k, item) => {
                    // console.log(item);
                    i++;
                    var line = "<tr>";
                    line += "<td>" + item.id + "</td>"
                    line += "<td><b>" + item.title + "</b><br/>"
                    line += item.body + "</td>"
                    line += "<td><button onClick='showDetails(" + item.id + ");'>Link</button></td>"
                    line += "</tr>";
                    $("#tblPost").append(line);
                    if (i == 10) {
                        loadPost().stop();
                    };
                });
                $("#main").show();
            })
            .fail((xhr, err, status) => {

            })
    }

    $(() => {
        LoadPosts();
        $("#detail").hide();
        $("#btnBack").click(() => {
            $("#main").show();
            $("#detail").hide();
            $("#detailROW").remove();
        });
    })
</script>

</html>
