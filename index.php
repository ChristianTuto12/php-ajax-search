<?php
$connection = new PDO("mysql:dbname=sakila;host=localhost", "root", "");
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

if(isset($_GET['value'])){
    $data = $connection->prepare("SELECT city FROM `city` WHERE city LIKE :value LIMIT 10");
    $value = $_GET["value"];


    $data->execute(["value"=>$value]);
    $datas = $data->fetchAll();
    echo json_encode($datas);
    die();
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search box</title>
</head>
<body>
    <div class="container">
        <div class="form" id="form">
            <form action="" >
                <input type="text" class="form__input" name="value" id="input" autocomplete="false">
            </form>
            <div class="auto" id="auto">
                <!-- <div class="line" id="line">
                <p>voluptatibus? A aut voluptatem in nam autem ratio</p>
                <a href="#">go</a>
            </div>

            <div class="line">
                <p>voluptatibus? A aut voluptatem in nam autem ratio</p>
                <a href="#">go</a>
            </div>

            <div class="line">
                <p>voluptatibus? A aut voluptatem in nam autem ratio</p>
                <a href="#">go</a>
            </div> -->
            </div>
        </div>
</div>

<script>
input.addEventListener('keyup', e=>{
    let req = new XMLHttpRequest()
    req.open("GET", "index.php?value="+e.target.value+"%")
    req.send()

    req.onreadystatechange = () =>{
        if(req.readyState === 4){
            if(req.status == 200){
                auto.remove()
                // consolelog(req.responseText)
                auto = document.createElement("div")
                auto.classList.add("auto")
                auto.setAttribute("id", "auto")
                res = JSON.parse(req.responseText)
                obj = Object(res)
                for(let i=0; i < obj.length; ++i){
                    console.log(obj)
                    let code = `<div class="line" id="line">
                    <p>${obj[i].city}</p>
                    <a href="#">go</a>`
                auto.innerHTML += code
                }
                form.appendChild(auto);

            
            }
        }
    }
})


</script>
    
</body>
</html>