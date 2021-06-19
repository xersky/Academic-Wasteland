<script>
    function RecShowModal(data){
      console.log(data);
      if(data != null){
        CreateTableFromJSON(data,"recModalCtn");
      }
      document.getElementById("RecModalBody").setAttribute("class","modal is-active");
      event.stopPropagation();
    }
    function FacShowModal(data){
      console.log(data);
      if(data != null){
        CreateTableFromJSON(data,"facModalCtn");
      }
      document.getElementById("FacModalBody").setAttribute("class","modal is-active");
      event.stopPropagation();
    }
    function NestedHideModal(){
        document.getElementById("RecModalBody").setAttribute("class","modal");
        document.getElementById("FacModalBody").setAttribute("class","modal");
        event.stopPropagation();
    }
</script>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item">
      <h3> ETron-Legacy </h3>
    </a>
  </div>
  
  <div id="navbarBasicExample" class="navbar-menu">
            <div class='navbar-start'>
                <a class='navbar-item' href='../ProviderSpace.php'>
                    Dashboard
                </a>

                <a class='navbar-item' href='./ClientPage.php'>
                    Clients
                </a>

                <div class='navbar-item has-dropdown is-hoverable'>
                    <a class='navbar-link'>
                        Tools
                    </a>

                    <div class='navbar-dropdown'>
                        <div class='navbar-item'  onclick="FacShowModal(null)">
                            Factures
                        </div>
                        <div class='navbar-item'  onclick="RecShowModal(null)">
                            Relamations 
                        </div>
                    </div>
                </div>
            </div>
    
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
            <a class="button is-primary" href="../../../Server/LogOutHandler.php">
              <strong>Log Out</strong>
            </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<script type="text/javascript">
function CreateTableFromJSON(jsonobj, locid) {
  var table = document.createElement("table");
  table.setAttribute("class","table");
  var col = [];
  for (var i = 0; i < jsonobj.length; i++) {
      for (var key in jsonobj[i]) {
          if (col.indexOf(key) === -1) {
              col.push(key);
          }
      }
  }
  var tablethread="<thead  class='thead-dark'><tr>";
  console.log(col);
  for (x in col) {
    tablethread+="<th scope='col'>"+col[x]+"</th>";
  }
  tablethread+="</tr></thead>";
  table.innerHTML=tablethread;
  var table_rows='<tbody>';
  for (var i = 0; i < jsonobj.length; i++) {
    var x = jsonobj[i];
      var json2=x;
      var row="<tr>"
        for (d in x) {
          var sty=x[d];
          if (sty!=null) {
            var st=sty.toString();
            var reps='<\\';    
            row+="<td><p>"+st.split('<').join('&lt;')+"</p></td>";
          }
          else {
            row+="<td><p>null</p></td>";
          }
        }
      row+="</tr>"
      table_rows+=row;
  }
  table_rows+='</tbody>';
  table.innerHTML+=table_rows;
  var divContainer = document.getElementById(locid);
  divContainer.innerHTML = "";
  divContainer.appendChild(table);
  divContainer.innerHTML += "<button onclick='NestedHideModal()'  class='btn'>go Back</button>";
}
</script>

<div>
  <div class="modal" id="FacModalBody">
      <div class="modal-background"></div>
      <div class="modal-content" id="facModalCtn">
          <?php include  $_SERVER['DOCUMENT_ROOT']."/Interface/Provider/Componants/SubComponants/Factures.php";?>
          <button onclick="NestedHideModal()"  class="btn">go Back</button>
      </div>
  </div>

  <div class="modal" id="RecModalBody">
      <div class="modal-background"></div>
      <div class="modal-content" id="recModalCtn">
          <?php include  $_SERVER['DOCUMENT_ROOT']."/Interface/Provider/Componants/SubComponants/Reclamations.php";?>
          <button onclick="NestedHideModal()" class="btn">go Back</button>
      </div>
  </div>
</div>