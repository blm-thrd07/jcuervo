 <? 
           if(is_array($json['comic']['comic']['comments'])){
                foreach ($json['comic']['comic']['comments'] as $key => $value) {
        ?>        
         <article>
          <h3><?echo $value['nombre']; ?></h3>
          <p><? echo $value['comment'] ?></p>
        </article>
              <?        
                }
              }
?>