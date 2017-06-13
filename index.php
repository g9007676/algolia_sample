<html lang="en"><head>
<meta charset="utf-8">
<meta name="robots" content="noindex">

<title>Algolia Search DEMO</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script
src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script>
       

<style type="text/css">
body {
    margin-top: 2%
}
</style>
<script>
$( document ).ready(function() {
    $('#searchbtn').click(function(){
        var _str = $('[name=keyword]').val();
        if (_str == '') {
            alert('請輸入產品關鍵字');
            return false;
        }

        $.post('search.php', {keyword:_str}, function(data){
            if (data == 'no') {
                alert('關鍵字:' + _str + ' 找不到任何結果');
                return;
            }
            var data = JSON.parse(data);
            var _table = document.getElementById("preTable").tBodies[0];
            $('#preTable tbody').html('');
            $.each(data, function(){
                var _row = _table.insertRow(_table.rows.length);
                var cell1 = _row.insertCell(0);
                var cell2 = _row.insertCell(1);
                var cell3 = _row.insertCell(2);


                cell1.appendChild(addSpan(this.objectID));
                cell2.appendChild(addSpan(this.name));
                cell3.appendChild(addSpan(this.keyword));
            });
//            var _table = document.getElementById("preTable").tBodies[0];
        });

        var addSpan = function(str) {
            span = document.createElement('span');
            span.innerHTML = str;
            return span;
        } 

        var addImg = function(str) {
            var img = document.createElement('img');
            img.src = str;
            img.width = '120';

            return img;
        } 

    });
})
</script>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form action="#" method="get">
                <div class="input-group">
                    <input class="form-control" id="system-search" name="keyword" placeholder="Search for" required="">
                    <span class="input-group-btn">
                        <button type="button" id="searchbtn"class="btn btn-default"><i class="glyphicon glyphicon-search"></i>~拜託點擊我~</button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-md-9">
            <table class="table table-list-search" id="preTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>keyword</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>   
        </div>
    </div>
</div>
</body>
</html>
