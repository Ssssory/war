<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <container>
       <div class="p1">
       <form method="post" action="manipulate.php">
          <input type="text" name="txtName" size="10" maxlength="10" value="Создание персонажа"><br /><br />
          <input type="text" name="NameForm" size="10" value="Имя персонажа">
          <p>Здоровье</p><input type="text" name="Hels" size="5" value="10">
          <p>Урон</p><input type="text" name="damage" size="5" value="2">
          <select name="wepon" size = multiple> 
              <option value=”set0”>Перочиный ножик</option> 
              <option value=”set1”>Пистолет</option> 
              <option value=”set2”>Аутомат</option>
              <option value=”set3”>СВД</option>
              <option value=”set4”>Пулеимёт</option>
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