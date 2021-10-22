
   function myOnLoad(x) {
	   if(x==0 || x== 1)
          if(x==0){
		  	 document.getElementById('pError').innerHTML = "¡El usuario no existe!";
			    document.getElementById('pError').style.color="#29CA8E"
		  }else{
			 document.getElementById('pError').innerHTML = "¡La contraseña es incorrecta!";
			    document.getElementById('pError').style.color="#29CA8E"
		  }
   }
 
   function mostrar(){
		document.getElementById('mEnviar').innerHTML = "Debes registrarte para acceder a esta funcionalidad";
		document.getElementById('mEnviar').style.color="#29CA8E"
		document.getElementById('mImprimir').innerHTML = "";
   }

   $('#imprimir').click(function (event){
		document.getElementById('mImprimir').innerHTML = "Debes registrarte para acceder a esta funcionalidad";
		document.getElementById('mImprimir').style.color="#29CA8E"
		document.getElementById('mEnviar').innerHTML = "";
	});


	function confirmarAccion(x){
		var accion=confirm(x);
		if (accion) 
			return true ;
		else
			return false ;
	}
