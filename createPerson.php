<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FrankenRoom</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/js-jquery-1.7.2.min.js"></script>
    <script>
    function view_post(){
        alert($('form').serialize());
    }
    function giv_random(min,max){
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    function create_random_one(){
        a = giv_random(1,5);
        .ajax({
            url: 'manipulate.php',
            type: "POST",
            date: ""
        });
    }
    </script>
</head>
<body>    
   <container>
       <div class="p1">
       <form method="post" action="manipulate.php">
          <label type="text">Создание персонажа</label><br /><br />
          <input type="text" name="NameForm" size="10" placeholder="Имя персонажа">
          <p>Здоровье</p><input type="text" name="Hels" size="5" value="200">
          <p>Урон</p><input type="text" name="damage" size="5" value="20">
          <select name="wepon" size = multiple> 
              <option value="1">Перочиный ножик</option> 
              <option value="2">Пистолет</option> 
              <option value="3">Аутомат</option>
              <option value="4">СВД</option>
              <option value="5">Пулеимёт</option>
           </select>
           <h3>Броня</h3>
           <input type="checkbox" name="armorhead" value="armhead"> Голова
           <input type="checkbox" name="armorbody" value="armbody"> Торс
           <input type="checkbox" name="armorfoot" value="armfoot"> Ноги
           <h3>Инвентарь</h3>
           <select name="slot1" size = multiple>
               <option value="clear">Пусто</option>
               <option value="grenade">Граната</option>
               <option value="medkit">Аптечка</option>               
           </select>
           <select name="slot2" size = multiple>
               <option value="clear">Пусто</option>
               <option value="grenade">Граната</option>
               <option value="medkit">Аптечка</option>               
           </select>
           <select name="slot3" size = multiple>
               <option value="clear">Пусто</option>
               <option value="grenade">Граната</option>
               <option value="medkit">Аптечка</option>               
           </select><br /><br />
           <input type='hidden' name='way' value='new_p_cr'></input>
           <input type="submit" value="Создать">            
       </form>    
       </div>
       
       <div class="p2">
           <a href="battlePerson.php">Назад</a>
       </div>
   </container>
    
</body>
</html>