<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dietas Personalizadas</title>
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Zetta&display=swap" rel="stylesheet">
  <style>
    /* Estilos generales */
    body {
      background: linear-gradient(to bottom, rgb(0, 0, 0), rgb(0, 0, 0));
      color: white;
      font-family: 'Lexend Zetta', sans-serif;
      margin: 0;
      padding: 0;
    }
    
    /* Navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: black;
      padding: 15px 40px;
      box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
    }
    .navbar .welcome {
      color: white;
      font-size: 15px;
      font-weight: bold;
    }
    .navbar .menu {
      display: flex;
      gap: 25px;
    }
    .navbar .menu a {
      color: white;
      text-decoration: none;
      padding: 12px 18px;
      font-size: 16px;
      font-weight: 600;
      transition: all 0.3s ease;
      border-radius: 8px;
    }
    .navbar .menu a:hover {
      background-color: white;
      color: black;
      box-shadow: 0px 4px 8px rgba(209, 209, 209, 0.2);
    }
    
    /* Footer */
    .footer {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      padding: 20px;
      background-color: #161616;
    }
    .footer-column {
      max-width: 300px;
    }
    .footer-bottom {
      text-align: center;
      padding: 10px;
      background-color: #000;
    }
    
    /* Estilos para botones verticales (ejemplo de sección “participa” o navegación extra) */
    .botones-verticales {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      height: 70vh;
    }
    .boton-container-agenda, 
    .boton-container-entrenamiento, 
    .boton-container-composicion-corporal, 
    .boton-container-dieta {
      width: 100%;
      margin-bottom: 20px;
    }
    .boton-container-agenda .boton, 
    .boton-container-entrenamiento .boton, 
    .boton-container-composicion-corporal .boton, 
    .boton-container-dieta .boton {
      width: 100%;
      box-sizing: border-box;
      height: 150px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    /* Botones con imágenes de fondo */
    .boton-container-agenda .boton {
      background-image: url('../Sources/EspacioUsuario/agenda_dark.jpg');
      background-size: cover;
      background-position: center;
      transition: background-image 0.3s ease;
    }
    .boton-container-agenda .boton:hover {
      background-image: url('../Sources/EspacioUsuario/agenda_light.jpg');
    }
    .boton-container-entrenamiento .boton {
      background-image: url('../Sources/EspacioUsuario/entrenamiento_dark.jpg');
      background-size: cover;
      background-position: center;
      transition: background-image 0.3s ease;
    }
    .boton-container-entrenamiento .boton:hover {
      background-image: url('../Sources/EspacioUsuario/entrenamiento_light.jpg');
    }
    .boton-container-composicion-corporal .boton {
      background-image: url('../Sources/EspacioUsuario/composicion_corporal_dark.png');
      background-size: cover;
      background-position: center;
      transition: background-image 0.3s ease;
    }
    .boton-container-composicion-corporal .boton:hover {
      background-image: url('../Sources/EspacioUsuario/composicion_corporal_light.png');
    }
    .boton-container-dieta .boton {
      background-image: url('../Sources/EspacioUsuario/dieta_dark.jpg');
      background-size: cover;
      background-position: center;
      transition: background-image 0.3s ease;
    }
    .boton-container-dieta .boton:hover {
      background-image: url('../Sources/EspacioUsuario/dieta_light.jpg');
    }
    .boton {
      background: none;
      color: #FFF;
      border: 2px solid rgb(255, 255, 255);
      border-radius: 0px;
      padding: 18px 36px;
      display: inline-block;
      font-size: 30px;
      letter-spacing: 10px;
      cursor: pointer;
      width: 100%;
      box-sizing: border-box;
      height: 150px;
      justify-content: center;
      align-items: center;
      text-shadow: 0 0 5px white, 0 0 10px white, 0 0 15px white;
      transition: all 0.3s ease;
    }
    .boton:hover {
      color: #000;
    }
    
    /* Estilos para los collapsibles */
    .collapsible {
      background-color: black;
      color: white;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 25px;
      transition: 0.4s;
      margin-bottom: 10px;
    }
    .active, .collapsible:hover {
      background-color: white;
      color: black;
    }
    .content {
      padding: 0 18px;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.2s ease-out;
      background-color: #161616;
      margin-bottom: 20px;
    }
    
    /* Estilos para la sección de recetas */
    .meal-category {
      margin-bottom: 20px;
    }
    .meal-category h3 {
      background: #4CAF50;
      color: white;
      padding: 10px;
      margin: 20px 0 10px;
      border-radius: 4px;
    }
    .recipe {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 10px;
      margin-bottom: 15px;
      background-color: #222;
      color: white;
    }
    .recipe h4 {
      margin: 5px 0;
      color: #4CAF50;
    }
    .recipe h5 {
      margin: 5px 0 0;
    }
    .recipe ul, .recipe ol {
      margin: 5px 0 10px 20px;
    }
    .macros {
      background: #333;
      padding: 8px;
      border-left: 5px solid #4CAF50;
      margin-bottom: 5px;
      font-size: 0.9em;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="welcome">Bienvenido a Dietas Personalizadas</div>
    <div class="menu">
      <a href="#equilibrada">Equilibrada</a>
      <a href="#keto">Keto</a>
      <a href="#volumen">Volumen</a>
      <a href="#masaMuscular">Masa Muscular</a>
      <a href="#definicion">Definición</a>
    </div>
  </div>
  
  <!-- Contenedor Principal -->
  <div class="container" style="padding:20px;">

    <!-- Dieta Equilibrada -->
    <button type="button" class="collapsible" id="equilibradaButton">Dieta Equilibrada</button>
    <div class="content" id="equilibrada">
      <!-- Desayuno -->
      <div class="meal-category">
        <h3>Desayuno</h3>
        <div class="recipe">
          <h4>Tostadas integrales con aguacate y huevo pochado</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Pan integral: 2 rebanadas</li>
            <li>Aguacate: ½ unidad</li>
            <li>Huevo: 1 unidad</li>
            <li>Aceite de oliva: 1 cucharadita</li>
            <li>Sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Tuesta las rebanadas de pan.</li>
            <li>Machaca el aguacate y unta sobre el pan.</li>
            <li>Cocina el huevo pochado en agua hirviendo (con un chorrito de vinagre) y colócalo sobre la tostada.</li>
            <li>Sazona con sal y pimienta.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 350 Cal, 15g Proteínas, 35g Carbs, 15g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Avena con frutas y nueces</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Avena: 60g</li>
            <li>Leche o bebida vegetal: 250 ml</li>
            <li>Fresas (picadas): 30g</li>
            <li>Arándanos: 30g</li>
            <li>Nueces (picadas): 10g</li>
            <li>Miel: 1 cucharadita</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Cocina la avena con la leche a fuego medio durante 5-7 minutos.</li>
            <li>Agrega las frutas y nueces.</li>
            <li>Decora con miel por encima.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 320 Cal, 10g Proteínas, 45g Carbs, 10g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Yogur griego con granola y miel</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Yogur griego natural: 150g</li>
            <li>Granola sin azúcar: 40g</li>
            <li>Frutos rojos: 50g</li>
            <li>Miel: 1 cucharada</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Coloca el yogur en un bol.</li>
            <li>Agrega granola y frutos rojos.</li>
            <li>Rocía miel por encima y mezcla suavemente.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 300 Cal, 20g Proteínas, 40g Carbs, 8g Grasas
          </div>
        </div>
      </div>
      
      <!-- Comida -->
      <div class="meal-category">
        <h3>Comida</h3>
        <div class="recipe">
          <h4>Ensalada de pollo a la parrilla</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Pechuga de pollo sin piel: 150g</li>
            <li>Mezcla de lechugas: 100g</li>
            <li>Tomates cherry: 50g</li>
            <li>Aguacate (en cubos): 30g</li>
            <li>Aceite de oliva virgen extra: 1 cucharada</li>
            <li>Jugo de medio limón, sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Sazona el pollo y ásalo (5-7 min por lado); córtalo en tiras.</li>
            <li>Mezcla lechuga, tomates y aguacate.</li>
            <li>Adereza con aceite, limón, sal y pimienta.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 400 Cal, 35g Proteínas, 10g Carbs, 20g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Salmón al horno con quinoa y vegetales</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Filete de salmón: 150g</li>
            <li>Quinoa (seca): 70g</li>
            <li>Brócoli: 100g</li>
            <li>Zanahorias (en rodajas): 100g</li>
            <li>Aceite de oliva: 1 cucharadita</li>
            <li>Ajo picado: 1 diente</li>
            <li>Jugo de limón, sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Precalienta el horno a 200°C y sazona el salmón con ajo, limón, sal y pimienta.</li>
            <li>Hornea el salmón durante 12-15 min.</li>
            <li>Cocina la quinoa según las instrucciones.</li>
            <li>Saltea brócoli y zanahorias con aceite y sirve junto al salmón.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 500 Cal, 30g Proteínas, 50g Carbs, 18g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Paella de verduras</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Arroz integral: 80g</li>
            <li>Garbanzos cocidos: 100g</li>
            <li>Pimiento rojo: 50g</li>
            <li>Pimiento verde: 50g</li>
            <li>Calabacín (en rodajas): 50g</li>
            <li>Tomate (picado): 1 mediano</li>
            <li>Ajo picado: 1 diente</li>
            <li>Pimentón: 1 cucharadita</li>
            <li>Aceite de oliva: 1 cucharada</li>
            <li>Azafrán o colorante, sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Sofríe ajo y pimientos en aceite de oliva.</li>
            <li>Agrega tomate y calabacín, cocina 5 min.</li>
            <li>Incorpora arroz, garbanzos, pimentón y azafrán; añade 200 ml de agua y cocina tapado hasta que el arroz esté tierno.</li>
            <li>Ajusta sal y pimienta antes de servir.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 450 Cal, 12g Proteínas, 70g Carbs, 10g Grasas
          </div>
        </div>
      </div>
      
      <!-- Cena -->
      <div class="meal-category">
        <h3>Cena</h3>
        <div class="recipe">
          <h4>Pechuga de pollo con espinacas salteadas</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Pechuga de pollo sin piel: 150g</li>
            <li>Espinacas frescas: 200g</li>
            <li>Ajo picado: 1 diente</li>
            <li>Aceite de oliva: 1 cucharadita</li>
            <li>Sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Sazona la pechuga y cocínala en sartén hasta dorar.</li>
            <li>Saltea las espinacas con ajo en otra sartén.</li>
            <li>Sirve el pollo sobre las espinacas.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 350 Cal, 40g Proteínas, 5g Carbs, 15g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Lentejas estofadas con verduras</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Lentejas (crudas): 100g</li>
            <li>Zanahoria (picada): 1</li>
            <li>Cebolla pequeña (picada): 1</li>
            <li>Ajo: 1 diente</li>
            <li>Pimiento rojo (picado): 50g</li>
            <li>Espinacas: 100g</li>
            <li>Aceite de oliva: 1 cucharada</li>
            <li>Laurel: 1 hoja</li>
            <li>Sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Sofríe la cebolla, ajo, pimiento y zanahoria en aceite.</li>
            <li>Agrega las lentejas y el laurel junto con agua suficiente para cubrir; cocina 30-40 min.</li>
            <li>Incorpora las espinacas y cocina 5 min adicionales.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 400 Cal, 25g Proteínas, 60g Carbs, 8g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Tacos de pescado a la plancha</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Pescado blanco (ej. merluza): 150g</li>
            <li>Tortillas de maíz: 2</li>
            <li>Repollo rallado: 50g</li>
            <li>Zanahoria rallada: 30g</li>
            <li>Mayonesa ligera (opcional): 1 cucharada</li>
            <li>Jugo de limón, sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Sazona y cocina el pescado a la plancha hasta dorar.</li>
            <li>Calienta las tortillas y rellena con pescado, repollo y zanahoria.</li>
            <li>Agrega mayonesa y unas gotas extra de limón si lo deseas.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 350 Cal, 28g Proteínas, 30g Carbs, 12g Grasas
          </div>
        </div>
      </div>
      
      <!-- Postres -->
      <div class="meal-category">
        <h3>Postres</h3>
        <div class="recipe">
          <h4>Copas de frutas frescas con yogur</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Fresas (en rodajas): 100g</li>
            <li>Kiwi (en rodajas): 100g</li>
            <li>Melón (picado): 100g</li>
            <li>Yogur natural bajo en grasa: 150g</li>
            <li>Miel: 1 cucharadita</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Mezcla las frutas en un bol.</li>
            <li>Sirve en copas con yogur encima y añade miel.</li>
            <li>Refrigera 10 min antes de servir.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 250 Cal, 10g Proteínas, 45g Carbs, 3g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Mousse de chocolate negro</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Chocolate negro (mín. 70% cacao): 50g</li>
            <li>Aguacate maduro: 100g</li>
            <li>Cacao en polvo sin azúcar: 2 cda</li>
            <li>Miel: 1 cda</li>
            <li>Leche de almendra: 50 ml</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Derrite el chocolate a baño maría.</li>
            <li>Licúa aguacate, cacao, miel, leche y chocolate derretido hasta obtener textura homogénea.</li>
            <li>Refrigera 1 hora antes de servir.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 300 Cal, 5g Proteínas, 25g Carbs, 20g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Cheesecake ligero de frutos rojos</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Queso cottage bajo en grasa: 150g</li>
            <li>Yogur griego: 50g</li>
            <li>Miel: 1 cucharada</li>
            <li>Galletas integrales trituradas: 30g</li>
            <li>Frutos rojos: ½ taza</li>
            <li>Jugo de limón: 1 cdita</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Mixer queso cottage, yogur, miel y jugo de limón hasta lograr crema homogénea.</li>
            <li>Incorpora las galletas trituradas.</li>
            <li>Distribuye en moldes individuales y refrigera al menos 3 horas.</li>
            <li>Decora con frutos rojos y sirve.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 280 Cal, 20g Proteínas, 30g Carbs, 6g Grasas
          </div>
        </div>
      </div>
    </div>
    <!-- Fin Dieta Equilibrada -->
    
    <!-- Dieta Keto -->
    <button type="button" class="collapsible" id="ketoButton">Dieta Keto</button>
    <div class="content" id="keto">
      <!-- Desayuno -->
      <div class="meal-category">
        <h3>Desayuno</h3>
        <div class="recipe">
          <h4>Omelette de espinacas y queso cheddar</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Huevos: 3 unidades</li>
            <li>Espinacas frescas: 50g</li>
            <li>Queso cheddar rallado: 30g</li>
            <li>Mantequilla: 1 cda</li>
            <li>Sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Bate los huevos con sal y pimienta.</li>
            <li>Derrite la mantequilla y añade las espinacas hasta marchitar.</li>
            <li>Vierte los huevos, añade el queso y dobla cuando comience a cuajar.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 400 Cal, 25g Proteínas, 5g Carbs, 30g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Smoothie de aguacate y coco</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Aguacate: ½ unidad</li>
            <li>Leche de coco sin azúcar: 200 ml</li>
            <li>Espinacas: 30g</li>
            <li>Semillas de chía: 1 cda</li>
            <li>Edulcorante (opcional): al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Licúa todos los ingredientes hasta obtener mezcla homogénea.</li>
            <li>Sirve frío.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 350 Cal, 5g Proteínas, 10g Carbs, 30g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Huevos revueltos con tocino y aguacate</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Huevos: 2 unidades</li>
            <li>Tocino: 2 rebanadas</li>
            <li>Aguacate (en cubos): ½ unidad</li>
            <li>Crema agria (opcional): 1 cda</li>
            <li>Sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Cocina el tocino en sartén hasta quedar crujiente.</li>
            <li>En la misma sartén, prepara huevos revueltos y añade los cubos de aguacate al final.</li>
            <li>Sirve con el tocino y, si deseas, con crema agria.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 450 Cal, 20g Proteínas, 5g Carbs, 35g Grasas
          </div>
        </div>
      </div>
      
      <!-- Comida -->
      <div class="meal-category">
        <h3>Comida</h3>
        <div class="recipe">
          <h4>Ensalada César con pollo y aguacate</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Pechuga de pollo a la parrilla: 150g</li>
            <li>Lechuga romana: 100g</li>
            <li>Queso parmesano rallado: 30g</li>
            <li>Aguacate (en rodajas): ½ unidad</li>
            <li>Aderezo César bajo en carbohidratos: 2 cdas</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Corta la pechuga en tiras y mézclala con lechuga, aguacate y parmesano.</li>
            <li>Adereza con el aderezo.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 500 Cal, 35g Proteínas, 8g Carbs, 35g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Salmón a la plancha con brócoli y mantequilla de ajo</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Filete de salmón: 150g</li>
            <li>Brócoli: 150g</li>
            <li>Mantequilla: 1 cda</li>
            <li>Ajo picado: 1 diente</li>
            <li>Sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Sazona el salmón con ajo, sal y pimienta; cocínalo a la plancha (aprox. 5 min por lado).</li>
            <li>Saltea el brócoli con mantequilla y ajo.</li>
            <li>Sirve ambos juntos.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 600 Cal, 40g Proteínas, 10g Carbs, 40g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Berenjenas rellenas de carne y queso</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Berenjena mediana (cortada a la mitad, removiendo parte del interior)</li>
            <li>Carne molida: 100g</li>
            <li>Queso mozzarella rallado: 30g</li>
            <li>Tomate picado: 1 pequeño</li>
            <li>Ajo picado: 1 diente</li>
            <li>Aceite de oliva: 1 cda</li>
            <li>Orégano, sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Sofríe la carne con ajo y tomate; agrega orégano, sal y pimienta.</li>
            <li>Rellena las mitades de la berenjena con la mezcla y espolvorea el queso encima.</li>
            <li>Hornea a 180°C durante 15-20 min hasta derretir el queso.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 550 Cal, 30g Proteínas, 15g Carbs, 35g Grasas
          </div>
        </div>
      </div>
      
      <!-- Cena -->
      <div class="meal-category">
        <h3>Cena</h3>
        <div class="recipe">
          <h4>Chuleta de cerdo con ensalada de col</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Chuleta de cerdo: 150g</li>
            <li>Repollo rallado: 100g</li>
            <li>Mayonesa casera (con aceite de oliva): 30g</li>
            <li>Vinagre de manzana: 1 cda</li>
            <li>Sal, pimienta y comino: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Sazona la chuleta con sal, pimienta y comino; cocínala a la parrilla o en sartén.</li>
            <li>Mezcla el repollo con mayonesa y vinagre.</li>
            <li>Sirve la chuleta con la ensalada.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 600 Cal, 35g Proteínas, 8g Carbs, 45g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Filete de res con espárragos a la mantequilla</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Filete de res: 150g</li>
            <li>Espárragos: 100g</li>
            <li>Mantequilla: 1 cda</li>
            <li>Ajo picado: 1 diente</li>
            <li>Sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Sazona y cocina el filete a la plancha a tu gusto.</li>
            <li>En otra sartén, derrite mantequilla con ajo y saltea los espárragos.</li>
            <li>Sirve el filete con los espárragos.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 650 Cal, 40g Proteínas, 10g Carbs, 45g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Sopa de calabaza y coco</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Calabaza en cubos: 200g</li>
            <li>Leche de coco: 200 ml</li>
            <li>Cebolla picada: 1 pequeña</li>
            <li>Aceite de coco: 1 cdita</li>
            <li>Curry en polvo: 1 cdita</li>
            <li>Agua (suficiente para cubrir)</li>
            <li>Sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Sofríe la cebolla en aceite de coco en una olla.</li>
            <li>Agrega calabaza y curry; cocina 5 min.</li>
            <li>Incorpora leche de coco y agua hasta cubrir; cocina hasta que la calabaza esté tierna.</li>
            <li>Licúa la mezcla, ajusta sal y pimienta y sirve caliente.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 500 Cal, 8g Proteínas, 20g Carbs, 40g Grasas
          </div>
        </div>
      </div>
      
      <!-- Postres -->
      <div class="meal-category">
        <h3>Postres</h3>
        <div class="recipe">
          <h4>Mousse de chocolate negro</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Chocolate negro (mín. 70% cacao): 50g</li>
            <li>Aguacate maduro: 100g</li>
            <li>Cacao en polvo sin azúcar: 2 cdas</li>
            <li>Miel: 1 cda</li>
            <li>Leche de almendra: 50 ml</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Derrite el chocolate a baño maría.</li>
            <li>Licúa todos los ingredientes hasta obtener una textura homogénea.</li>
            <li>Refrigera 1 hora antes de servir.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 300 Cal, 5g Proteínas, 25g Carbs, 20g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Helado de fresa sin azúcar</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Fresas frescas: 200g</li>
            <li>Crema de coco: 100 ml</li>
            <li>Edulcorante (eritritol o stevia): al gusto</li>
            <li>Jugo de limón: ½ cdita</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Congela las fresas al menos 3 horas.</li>
            <li>Licúa las fresas congeladas con la crema, el edulcorante y el jugo de limón hasta obtener una consistencia similar a helado.</li>
            <li>Sirve inmediatamente o refrigera unos minutos antes.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 300 Cal, 3g Proteínas, 15g Carbs, 25g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Brownie de almendra</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Harina de almendra: 70g</li>
            <li>Cacao en polvo sin azúcar: 30g</li>
            <li>Huevos: 2 unidades</li>
            <li>Mantequilla derretida: 50g</li>
            <li>Edulcorante (eritritol): al gusto</li>
            <li>Esencia de vainilla: 1 cdita</li>
            <li>Polvo de hornear: ½ cdita</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Precalienta el horno a 180°C.</li>
            <li>Mezcla todos los ingredientes hasta obtener una masa homogénea.</li>
            <li>Vierte la mezcla en un molde engrasado y hornea durante 20-25 min (prueba con palillo).</li>
            <li>Deja enfriar y corta en porciones.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 400 Cal, 10g Proteínas, 15g Carbs, 35g Grasas
          </div>
        </div>
      </div>
    </div>
    <!-- Fin Dieta Keto -->
    
    <!-- Dieta Para Volumen -->
    <button type="button" class="collapsible" id="volumenButton">Dieta Para Volumen</button>
    <div class="content" id="volumen">
      <!-- Desayuno -->
      <div class="meal-category">
        <h3>Desayuno</h3>
        <div class="recipe">
          <h4>Tostadas francesas con plátano y miel</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Pan de molde integral: 2 rebanadas</li>
            <li>Huevos: 2 unidades</li>
            <li>Plátano (en rodajas): 1 mediano</li>
            <li>Mantequilla: 1 cdita</li>
            <li>Canela: al gusto</li>
            <li>Miel: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Bate los huevos y sumerge el pan (espolvoreado con canela).</li>
            <li>Cocina las tostadas en sartén con mantequilla hasta dorarse.</li>
            <li>Sirve con rodajas de plátano y miel por encima.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 450 Cal, 18g Proteínas, 60g Carbs, 15g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Smoothie proteico de avena y frutos rojos</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Avena: 50g</li>
            <li>Proteína en polvo (vainilla): 1 scoop (30g)</li>
            <li>Frutos rojos mixtos: 100g</li>
            <li>Leche entera: 250 ml</li>
            <li>Miel: 1 cdita</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Licúa todos los ingredientes hasta obtener una mezcla homogénea.</li>
            <li>Sirve en vaso alto.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 400 Cal, 25g Proteínas, 55g Carbs, 10g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Bowl de yogur con granola y nueces</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Yogur natural: 200g</li>
            <li>Granola: 50g</li>
            <li>Nueces (picadas): 15g</li>
            <li>Miel: 1 cda</li>
            <li>Fruta fresca variada: 100g</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Mezcla el yogur con granola, nueces y fruta.</li>
            <li>Rocía miel por encima.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 420 Cal, 15g Proteínas, 50g Carbs, 18g Grasas
          </div>
        </div>
      </div>
      
      <!-- Comida -->
      <div class="meal-category">
        <h3>Comida</h3>
        <div class="recipe">
          <h4>Arroz integral con carne de res y vegetales</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Arroz integral: 80g</li>
            <li>Carne de res magra: 150g</li>
            <li>Brócoli: 100g</li>
            <li>Zanahoria: 100g</li>
            <li>Aceite de oliva: 1 cda</li>
            <li>Salsa de soja, sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Cocina el arroz integral.</li>
            <li>Saltea la carne junto con los vegetales, sazona con salsa de soja, sal y pimienta.</li>
            <li>Mezcla el arroz con la preparación y sirve.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 600 Cal, 35g Proteínas, 70g Carbs, 20g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Pasta integral con pollo y pesto</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Pasta integral: 100g</li>
            <li>Pechuga de pollo: 150g</li>
            <li>Pesto casero: 30g</li>
            <li>Tomates cherry: 50g</li>
            <li>Aceite, sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Cocina la pasta conforme al paquete.</li>
            <li>Asa la pechuga de pollo en tiras y mézclala con la pasta, pesto y tomates.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 650 Cal, 40g Proteínas, 75g Carbs, 18g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Burrito de frijoles y queso</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Tortilla integral: 1 unidad</li>
            <li>Frijoles negros cocidos: 100g</li>
            <li>Arroz blanco: 70g</li>
            <li>Queso cheddar: 30g</li>
            <li>Aguacate (picado): ¼ unidad</li>
            <li>Salsa, sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Coloca todos los ingredientes en la tortilla.</li>
            <li>Enrolla formando un burrito y sirve.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 700 Cal, 25g Proteínas, 80g Carbs, 25g Grasas
          </div>
        </div>
      </div>
      
      <!-- Cena -->
      <div class="meal-category">
        <h3>Cena</h3>
        <div class="recipe">
          <h4>Salmón al horno con papas asadas</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Filete de salmón: 150g</li>
            <li>Papas: 200g</li>
            <li>Aceite, romero, sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Sazona el salmón y las papas; hornea a 200°C hasta dorar (20-25 min).</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 600 Cal, 35g Proteínas, 50g Carbs, 25g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Quinoa con tofu y vegetales salteados</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Quinoa: 70g</li>
            <li>Tofu firme: 150g</li>
            <li>Pimientos: 50g</li>
            <li>Calabacín: 50g</li>
            <li>Aceite de sésamo, salsa de soja, jengibre y ajo: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Cocina la quinoa conforme a las instrucciones.</li>
            <li>Saltea tofu y vegetales con las especias.</li>
            <li>Mezcla la quinoa y sirve.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 550 Cal, 28g Proteínas, 60g Carbs, 20g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Pollo al curry con arroz basmati</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Pechuga de pollo: 150g</li>
            <li>Leche de coco: 100 ml</li>
            <li>Arroz basmati: 80g</li>
            <li>Curry en polvo: 1 cdita</li>
            <li>Cebolla picada y aceite: al gusto</li>
            <li>Sal: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Sazona y cocina el pollo en salsa de curry con leche de coco.</li>
            <li>Cocina el arroz basmati según las instrucciones.</li>
            <li>Sirve el pollo junto al arroz.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 650 Cal, 35g Proteínas, 70g Carbs, 22g Grasas
          </div>
        </div>
      </div>
      
      <!-- Postres -->
      <div class="meal-category">
        <h3>Postres</h3>
        <div class="recipe">
          <h4>Batido de chocolate y mantequilla de maní</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Leche entera: 250 ml</li>
            <li>Proteína de chocolate: 1 scoop</li>
            <li>Mantequilla de maní: 1 cda</li>
            <li>Plátano: 1 mediano</li>
            <li>Hielo: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Licúa todos los ingredientes hasta obtener una mezcla cremosa.</li>
            <li>Sirve inmediatamente.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 500 Cal, 30g Proteínas, 50g Carbs, 20g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Bowl de fruta con crema de coco</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Fruta variada (manzana, pera, plátano): 150g</li>
            <li>Crema de coco: 50 ml</li>
            <li>Nueces: 15g</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Corta la fruta y mézclala con la crema de coco y las nueces.</li>
            <li>Sirve frío.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 400 Cal, 8g Proteínas, 60g Carbs, 15g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Barra casera de avena y almendra</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Avena: 60g</li>
            <li>Almendras picadas: 20g</li>
            <li>Miel: 2 cdas</li>
            <li>Mantequilla: 1 cda</li>
            <li>Frutos secos: 15g</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Mezcla todos los ingredientes hasta integrarlos.</li>
            <li>Extiende en un molde y hornea a 180°C durante 20 min.</li>
            <li>Deja enfriar y corta en barras.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 450 Cal, 10g Proteínas, 55g Carbs, 15g Grasas
          </div>
        </div>
      </div>
    </div>
    <!-- Fin Dieta Para Volumen -->
    
    <!-- Dieta Para Masa Muscular -->
    <button type="button" class="collapsible" id="masaMuscularButton">Dieta Para Masa Muscular</button>
    <div class="content" id="masaMuscular">
      <!-- Desayuno -->
      <div class="meal-category">
        <h3>Desayuno</h3>
        <div class="recipe">
          <h4>Tortilla de claras con espinacas y queso cottage</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Claras de huevo: 4 (aprox. de 4 huevos)</li>
            <li>Espinacas frescas: 50g</li>
            <li>Queso cottage: 50g</li>
            <li>Aceite en spray, sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Bate las claras con sal y pimienta.</li>
            <li>Cocínalas en sartén antiadherente junto con espinacas y añade el queso cottage al final.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 300 Cal, 30g Proteínas, 10g Carbs, 10g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Avena con proteína y frutos secos</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Avena: 50g</li>
            <li>Leche descremada: 200 ml</li>
            <li>Proteína en polvo: 1 scoop</li>
            <li>Almendras: 15g</li>
            <li>Miel: 1 cdita</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Cocina la avena en leche.</li>
            <li>Agrega la proteína y decora con almendras y miel.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 350 Cal, 25g Proteínas, 45g Carbs, 8g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Batido de proteína con frutas</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Leche de almendras: 250 ml</li>
            <li>Proteína de vainilla: 1 scoop</li>
            <li>Plátano (pequeño): 1 unidad</li>
            <li>Avena: 20g</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Licúa todos los ingredientes y sirve frío.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 320 Cal, 28g Proteínas, 40g Carbs, 7g Grasas
          </div>
        </div>
      </div>
      
      <!-- Comida -->
      <div class="meal-category">
        <h3>Comida</h3>
        <div class="recipe">
          <h4>Pechuga de pollo con batata y brócoli</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Pechuga de pollo: 200g</li>
            <li>Batata: 150g</li>
            <li>Brócoli: 100g</li>
            <li>Aceite de oliva: 1 cdita</li>
            <li>Sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Asa el pollo y la batata; cocina el brócoli al vapor.</li>
            <li>Sirve todo junto.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 500 Cal, 45g Proteínas, 40g Carbs, 12g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Carne magra con arroz integral y ensalada</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Carne de res magra: 150g</li>
            <li>Arroz integral: 70g</li>
            <li>Ensalada mixta: 100g</li>
            <li>Aceite de oliva: 1 cda</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Asa la carne; cocina el arroz.</li>
            <li>Mezcla la ensalada con aceite y acompaña con carne y arroz.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 550 Cal, 40g Proteínas, 50g Carbs, 15g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Ensalada de atún con quinoa</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Atún en agua: 150g</li>
            <li>Quinoa: 70g</li>
            <li>Espinacas: 50g</li>
            <li>Pimiento: 50g</li>
            <li>Aceite de oliva y limón: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Cocina la quinoa conforme a las instrucciones.</li>
            <li>Mezcla con atún, espinacas y pimiento; adereza con aceite y limón.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 500 Cal, 38g Proteínas, 45g Carbs, 12g Grasas
          </div>
        </div>
      </div>
      
      <!-- Cena -->
      <div class="meal-category">
        <h3>Cena</h3>
        <div class="recipe">
          <h4>Filete de ternera con espinacas y champiñones</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Filete de ternera: 200g</li>
            <li>Espinacas: 100g</li>
            <li>Champiñones: 50g</li>
            <li>Aceite de oliva: 1 cdita</li>
            <li>Sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Asa el filete a tu gusto.</li>
            <li>Saltea espinacas y champiñones en aceite.</li>
            <li>Sirve el filete con los vegetales.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 550 Cal, 45g Proteínas, 10g Carbs, 25g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Salmón al vapor con arroz salvaje y judías verdes</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Salmón: 150g</li>
            <li>Arroz salvaje: 70g</li>
            <li>Judías verdes: 100g</li>
            <li>Limón, aceite y sal: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Cocina el salmón al vapor y prepara el arroz salvaje.</li>
            <li>Cocina las judías verdes al vapor o salteadas ligeramente.</li>
            <li>Sirve todo con unas gotas de limón.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 520 Cal, 40g Proteínas, 45g Carbs, 15g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Wrap de pollo con vegetales y hummus</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Tortilla integral: 1 unidad</li>
            <li>Pechuga de pollo: 150g</li>
            <li>Hummus: 2 cdas</li>
            <li>Lechuga, tomate y cebolla: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Calienta la tortilla; coloca dentro pollo cortado en tiras, hummus y vegetales.</li>
            <li>Enrolla y sirve.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 480 Cal, 35g Proteínas, 50g Carbs, 10g Grasas
          </div>
        </div>
      </div>
      
      <!-- Postres -->
      <div class="meal-category">
        <h3>Postres</h3>
        <div class="recipe">
          <h4>Yogur griego con nueces y miel</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Yogur griego: 200g</li>
            <li>Nueces picadas: 15g</li>
            <li>Miel: 1 cdita</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Mezcla el yogur con las nueces y añade miel.</li>
            <li>Sirve frío.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 280 Cal, 20g Proteínas, 25g Carbs, 10g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Batido de frutos rojos con proteína</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Frutos rojos: 100g</li>
            <li>Leche descremada: 200 ml</li>
            <li>Proteína en polvo: 1 scoop</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Licúa todos los ingredientes hasta obtener una mezcla homogénea.</li>
            <li>Sirve frío.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 300 Cal, 28g Proteínas, 30g Carbs, 5g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Barra de proteína casera</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Avena: 40g</li>
            <li>Proteína en polvo: 20g</li>
            <li>Almendras: 15g</li>
            <li>Miel: 1 cda</li>
            <li>Mantequilla de maní: 1 cdita</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Mezcla todos los ingredientes hasta formar una masa.</li>
            <li>Forma barras y refrigera por al menos 1 hora antes de cortar.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 350 Cal, 25g Proteínas, 40g Carbs, 12g Grasas
          </div>
        </div>
      </div>
    </div>
    <!-- Fin Dieta Masa Muscular -->
    
    <!-- Dieta Para Definición -->
    <button type="button" class="collapsible" id="definicionButton">Dieta Para Definición</button>
    <div class="content" id="definicion">
      <!-- Desayuno -->
      <div class="meal-category">
        <h3>Desayuno</h3>
        <div class="recipe">
          <h4>Claras de huevo revueltas con espinacas</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Claras de huevo: 4</li>
            <li>Espinacas: 50g</li>
            <li>Tomate pequeño: 1</li>
            <li>Aceite en spray: al gusto</li>
            <li>Sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Cocina las claras con espinacas y tomate en sartén antiadherente.</li>
            <li>Sazona con sal y pimienta.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 200 Cal, 30g Proteínas, 8g Carbs, 3g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Smoothie verde desintoxicante</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Espinacas: 50g</li>
            <li>Pepino: 50g</li>
            <li>Manzana verde: 1 pequeña</li>
            <li>Agua de coco: 200 ml</li>
            <li>Hielo: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Licúa todos los ingredientes hasta obtener una mezcla uniforme.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 180 Cal, 5g Proteínas, 35g Carbs, 2g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Tostada integral con aguacate y tomate</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Pan integral: 1 rebanada</li>
            <li>Aguacate: ¼</li>
            <li>Rodajas de tomate: al gusto</li>
            <li>Sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Tosta el pan integral.</li>
            <li>Unta el aguacate machacado y coloca las rodajas de tomate.</li>
            <li>Sazona con sal y pimienta.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 220 Cal, 7g Proteínas, 30g Carbs, 9g Grasas
          </div>
        </div>
      </div>
      
      <!-- Comida -->
      <div class="meal-category">
        <h3>Comida</h3>
        <div class="recipe">
          <h4>Ensalada de pollo a la plancha con verduras</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Pechuga de pollo: 150g</li>
            <li>Lechuga mixta: 100g</li>
            <li>Pepino: 50g</li>
            <li>Tomate: 50g</li>
            <li>Vinagre balsámico y aceite en spray: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Asa la pechuga y córtala en tiras.</li>
            <li>Mezcla la ensalada, pepino y tomate; adereza ligeramente.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 350 Cal, 35g Proteínas, 15g Carbs, 10g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Filete de pescado al vapor con verduras</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Filete de pescado blanco: 150g</li>
            <li>Espárragos: 100g</li>
            <li>Zanahoria: 50g</li>
            <li>Limón y sal: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Prepara el pescado y las verduras al vapor.</li>
            <li>Adereza con limón y sal.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 300 Cal, 30g Proteínas, 12g Carbs, 8g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Tazón de quinoa con garbanzos y verduras</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Quinoa: 60g</li>
            <li>Garbanzos cocidos: 100g</li>
            <li>Pimiento: 50g</li>
            <li>Espinacas: 50g</li>
            <li>Limón, orégano y sal: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Cocina la quinoa y mezcla con garbanzos y verduras picadas.</li>
            <li>Adereza con limón, orégano y sal.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 400 Cal, 15g Proteínas, 55g Carbs, 10g Grasas
          </div>
        </div>
      </div>
      
      <!-- Cena -->
      <div class="meal-category">
        <h3>Cena</h3>
        <div class="recipe">
          <h4>Pechuga de pavo a la plancha con brócoli</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Pechuga de pavo: 150g</li>
            <li>Brócoli: 150g</li>
            <li>Ajo, aceite y sal: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Asa la pechuga de pavo.</li>
            <li>Cocina el brócoli al vapor o salteado ligeramente.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 320 Cal, 35g Proteínas, 10g Carbs, 8g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Sopa de verduras ligera</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Caldo de verduras: 300 ml</li>
            <li>Varias verduras (zanahoria, calabacín, apio): 150g</li>
            <li>Hierbas frescas, sal y pimienta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Cocina las verduras en el caldo hasta quedar tiernas.</li>
            <li>Sazona y sirve caliente.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 250 Cal, 10g Proteínas, 30g Carbs, 5g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Ensalada de espinacas y garbanzos</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Espinacas: 100g</li>
            <li>Garbanzos cocidos: 100g</li>
            <li>Tomate cherry: 50g</li>
            <li>Vinagreta ligera: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Mezcla todos los ingredientes y adereza con la vinagreta.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 280 Cal, 15g Proteínas, 25g Carbs, 5g Grasas
          </div>
        </div>
      </div>
      
      <!-- Postres -->
      <div class="meal-category">
        <h3>Postres</h3>
        <div class="recipe">
          <h4>Yogur griego con granada y menta</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Yogur griego: 150g</li>
            <li>Semillas de granada: 40g</li>
            <li>Hojas de menta: al gusto</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Mezcla el yogur con las semillas y añade hojas de menta picadas.</li>
            <li>Sirve frío.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 220 Cal, 12g Proteínas, 28g Carbs, 5g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Infusión de frutas y té verde</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Té verde: 1 taza</li>
            <li>Rodajas de cítricos: al gusto</li>
            <li>Miel: 1 cdita (opcional)</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Prepara una taza de té verde caliente.</li>
            <li>Agrega rodajas de cítricos y miel si deseas.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 180 Cal, 3g Proteínas, 35g Carbs, 2g Grasas
          </div>
        </div>
        <div class="recipe">
          <h4>Gelatina light con frutas</h4>
          <h5>Ingredientes:</h5>
          <ul>
            <li>Gelatina sin azúcar: 1 sobre</li>
            <li>Fruta fresca picada: 100g</li>
            <li>Agua y edulcorante: según indicaciones</li>
          </ul>
          <h5>Instrucciones:</h5>
          <ol>
            <li>Prepara la gelatina según las instrucciones del paquete.</li>
            <li>Agrega la fruta y refrigera hasta cuajar.</li>
          </ol>
          <div class="macros">
            <strong>Macros:</strong> 200 Cal, 6g Proteínas, 30g Carbs, 1g Grasas
          </div>
        </div>
      </div>
    </div>
    <!-- Fin Dieta Para Definición -->
  </div>
  
  <!-- Script para desplegables -->
  <script>
    var coll = document.getElementsByClassName("collapsible");
    var i;
    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight){
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
        } 
      });
    }
  </script>
  
  <!-- Footer -->
  <div class="footer">
    <div class="footer-column">
      <h3>Contacto</h3>
      <ul>
        <li><a href="#">Email</a></li>
        <li><a href="#">Teléfono</a></li>
      </ul>
    </div>
    <div class="footer-column">
      <h3>Acerca de</h3>
      <ul>
        <li><a href="#">Nuestra empresa</a></li>
        <li><a href="#">Términos y condiciones</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    © 2023 Dietas Personalizadas. Todos los derechos reservados.
  </div>
</body>
</html>
