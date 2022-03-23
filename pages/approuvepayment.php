<?php
include_once "../config.php";
include_once $DONNEES_TRANSACTION_DAO;
$utilisateur_mail = ($_SESSION[courriel]);
$prix = $_COOKIE["price"];
$id_transaction= $_COOKIE["orderid"];
$qte = $_COOKIE["quantity"];
$transaction_date = date('Y-m-d');
$nom = "Paypal_transaction";

TransactionDAO::creerTransation($nom,$prix,$qte,$utilisateur_mail,$transaction_date,$id_transaction);
?>
<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>Confirmation Paypal</title>
  <meta http-equiv="refresh" content="3; ../index.php">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>
<a target="_blank" style="position: absolute; right: 15px; bottom: 15px;"></a>
<style>
div {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  margin: auto;
}

input {
  position: absolute;
  animation-duration: 0.8s;
  animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1.275);
}

input.grow {
    animation-name: grow;
}

@keyframes grow {
  0%     { transform: scale(10);       }
  20%    { transform: scale(11.5);     }
  100%   { transform: scale(1);       }
}
</style>
<script>
var RES_X = 1;
var RES_Y = 1;
var SIZE = 1;

// super laggy on mobile devices so ease up the res
if( /iphone|ipad|android/ig.test( navigator.userAgent ) ) {
  RES_X = 1;
  RES_Y = 1;
  SIZE = 1;
}

var entities = [];

var wrapper = document.createElement( 'div' );
wrapper.style.width = ( RES_X * SIZE ) + 'px';
wrapper.style.height = ( RES_Y * SIZE ) + 'px';
document.body.appendChild( wrapper );

for( var x = 0; x < RES_X; x++ ) {
  for( var y = 0; y < RES_Y; y++ ) {
    var el = document.createElement( 'input' );
    el.setAttribute( 'type', 'checkbox' );
    wrapper.appendChild( el );
    
    var entity = {
      element: el,
      x: x * SIZE,
      y: y * SIZE
    }
    
    el.style.left = entity.x + 'px';
    el.style.top = entity.y + 'px';
    el.addEventListener( 'change', this.toggle.bind( this, entity ) );
    
    entities.push( entity );
  }
}

function toggle( targetEntity ) {
  
  var checked = targetEntity.element.checked;
  
  entities.forEach( function( entity ) {

    var dx = targetEntity.x - entity.x;
    var dy = targetEntity.y - entity.y;
    var distance = Math.sqrt( dx * dx + dy * dy );
    
    setTimeout( function() {
      entity.element.checked = checked;
      
      // re-run the animation, reading offsetWidth forces reflow
      entity.element.className = '';
      entity.element.offsetWidth;
      entity.element.className = 'grow';
    }, Math.round( distance * 1.8 ) );
    
  } );
  
}

setTimeout( function() {
  entities[ 0 ].element.checked = true;
  toggle( entities[ 0 ] );
}, 500 );

  </script>
</body>
</html>
