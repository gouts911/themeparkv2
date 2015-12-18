        <div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<?php echo $this->element('menu/side_menu'); ?>
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
        
        
            <h3>Francois Gauthier</h3>
            
            <h4>420-267 MO Développer un site Web et une application pour Internet</h4>
                            <h4>Automne 2015, Collège Montmorency</h4>
                           <!--<?php echo $this->Html->image('Theme_Park_clip_art.svg', array('width' => '700', 'height' => '800')); ?>-->

                            
                            <p>
                                La liste lié ce fait avec les pays et états dans les vues add et edit du model park.
                                Lorsque le pays est sélectionné une liste d'état/province apparaissent dans la 2e liste.
                            </p>
                            <p>
                                L'autocomplete ce fait dans la vue add du model area, lorsque l'on entre le nom de la zone,
                                une liste des zone déjà existantes apparaissent selon la lettre entré. Par exemple, les lettres 'P' et 'K'
                                font apparaitre Plage et Kids Zone.
                            </p>
                            <p>
                                Lors de l'inscription d'un nouvel utilisateur, un courriel est envoyé permettant la confirmation de l'utilisateur.
                                Si le compte n'est pas confirmé, l'utilisateur peut encore voir les differentes options disponibles pour les propriétaire,
                                mais ne peut avoir acces aux vues add edit ni delete, tant que celui-ci n'a pas confirmé son compte. Un bouton,
                                permettant l'envoie d'un courriel de confirmation ,est aussi disponible dans la vue view de modele user. 
                            </p>
                            <a href="http://www.databaseanswers.org/data_models/theme_park_and_visitor_activity/index.htm">site original du modele</a>
                            </br>
                            <img src="http://www.databaseanswers.org/data_models/theme_park_and_visitor_activity/images/data_model.gif">
                            <!--<script src="dist/snap.svg.js" type="text/javascript"></script>-->
                            <!--<img src ="Theme_Park_clip_art.svg"/>-->
                            <object data="/themepark_v2.0.0/app/webroot/img/Kids_At_Theme_Park_clip_art2.svg" type="image/svg+xml" id="themepark" width="400px" height="400px"></object>
    <script>            
        
       
    
     /*   frame = 20;
	direction = 1;
    function a() {
	//rondvert = document.getElementById("path115"); /* Récupère l'élément du document dont l'id est 'path22' */
	//rondvert.setAttribute("cy", frame+100);    /* Change la position verticale de cet élément */
       // group = document.getElementById("group");
        //group.style.background = "#ff0000";
        
        /*var a = document.getElementById("themepark");
        
        a.style.background = "#ff0000";

        //it's important to add an load event listener to the object, as it will load the svg doc asynchronously
        a.addEventListener("load",function(){
            var svgDoc = a.contentDocument; //get the inner DOM of alpha.svg
            alert(svgDoc);
            var delta = svgDoc.getElementById("path511"); //get the inner element by id
            delta.style.background = "#ff0000";    //add behaviour
        },false);
    }*/
    </script>
        
        
        
        
        
        
    
        
