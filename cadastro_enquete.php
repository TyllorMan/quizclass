<html>
   <head>
          <title>Enquetes v1.0</title>
         
   </head>
   <body>
       <div id="config">
         <form action="salvar_enquete.php" method="POST">  
            <div id="criarEnquete">
             
                  Titulo:<input type="text" id="titulo" name="titulo" ></input></br>
                  Alternativa 1<input type="text" id="alt0" name="alt0"></input></br>
                  Alternativa 2<input type="text" id="alt1" name="alt1"></input></br>
            </div>
            <div id="botoes">
               <a href="#" onClick="adicionarEnquete();">Adicionar Alternativa</a>
               <input type="submit" value="Criar Enquete"/>
            </div>
         </form> 
        </div>

        <div id="votando">
          <div id="exibirTitulo">
          </div>
             <div id="exibirEnquete">
             </div>
        </div>

        <div id="votoComputado">
             Obrigado por Votar!!!
             <button onClick="novoVoto();">Novo</button>
             <button onClick="resultadoEnquete();">Resultado</button> 
        </div>

        <div id="resultadoEnquete">
        </div>
       
   </body>

   <script language="javascript">
   var titulo;
   var alternativas = new Array();
   var votos = new Array();

   function configurarEnquete()  {
      var form = "";
          var i;
          titulo = document.getElementById("titulo").value;        
          for(i=0;i<x;i++) {
            var item = "alt"+i;   
            alternativas[i] =  document.getElementById(item).value; 
            votos[i] = 0;  
          }
   }

   function resultadoEnquete() {
     document.getElementById("resultadoEnquete").style.display='block';
       document.getElementById("resultadoEnquete").innerHTML="";
       for(i=0;i<x;i++) {
            var item = "alt"+i; 
            document.getElementById("resultadoEnquete").innerHTML+= 
            alternativas[i]+" "+votos[i]; 
            document.getElementById("resultadoEnquete").innerHTML+="</br>";
        }
   }

    document.getElementById("votoComputado").style.display='none';
             var x = 2;
             var respostas = new Array();
        function adicionarEnquete() {

             document.getElementById("criarEnquete").innerHTML+="Alternativa "+(x+1)+"<input type='text/' id='alt"+ (x) +"'  name='alt"+ (x++) +"' ></input></br>"
        }   

       function esconderEnquete() {
          document.getElementById("config").style.display='none';
       }
       function votar() {
        document.getElementById("votando").style.display='none';
        document.getElementById("votoComputado").style.display='block';
        for(i=0;i<x;i++) {
            
            if( document.getElementById(alternativas[i]).checked) {
                votos[i]++;
                //prompt(i+" = "+votos[i]);
                document.getElementById(alternativas[i]).checked = false;
                break;
            }
          }
       }
        function novoVoto() {
          document.getElementById("votoComputado").style.display='none';
          document.getElementById("resultadoEnquete").style.display='none';
         document.getElementById("votando").style.display='block';
        
       }

       function exibirEnquete() {
         document.getElementById("votoComputado").style.display='none';
         document.getElementById("votando").style.display='block';
            var form = "";
            var i;
          document.getElementById("exibirTitulo").innerHTML+=titulo; 
            //document.getElementById("exibirEnquete").innerHTML+="d";
            for(i=0;i<x;i++) {
            var item = "alt"+i;     
            var texto = "<input id='"+alternativas[i]+"' type='radio' name='enquete' value="+alternativas[i]+">"+alternativas[i];
                document.getElementById("exibirEnquete").innerHTML+=texto;
            document.getElementById("exibirEnquete").innerHTML+="</br>";
            }
          document.getElementById("exibirEnquete").innerHTML+="<button onClick='votar();'>Votar</button>"   
        }

   </script>
</html>
