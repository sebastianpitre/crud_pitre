<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Formulario</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    overflow: hidden;
    height: 100vh;
    cursor: url(cur/cursor1.png), pointer;
}

section {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(to bottom, #f1f4f9, #dff1ff);
} 

section .color {
    position: absolute;
    filter: blur(150px);
}

section .color:nth-child(1) {
    top: -350px;
    width: 800px;
    height: 500px;
}

section .color:nth-child(2) {
    bottom: -150px;
    left: -100px;
    width: 50%;
    height: 500px;
}

section .color:nth-child(3) {
    bottom: -50px;
    right: -200px;
    width: 500px;
    height: 500px;
} 

.box {
    position: relative;
}

.contenedor {
    position: relative;
    width: 400px;
    min-height: 400px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(5px);
    box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-right: 1px solid rgba(255, 255, 255, 0.2);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);


}

.formulario {
    position: relative;
    width: 100%;
    height: 100%;
    padding: 40px;
}

.formulario h2 {
    position: relative;
    color: #000;
    font-size: 24px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 40px;


}

.formulario h2::before {
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    width: 80px;
    height: 4px;
    background: #000;
}

.formulario .input {
    width: 100%;
    margin-top: 20px;
}

.formulario .input input {
    width: 100%;
    margin-top: 20px;
    background: rgba(255, 255, 255, 0.2);
    border: none;
    outline: none;
    padding: 10px 20px;
    border-radius: 35px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-right: 1px solid rgba(255, 255, 255, 0.2);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    font-size: 16px;
    letter-spacing: 1px;
    color: #000;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05)
}

.formulario .input input::placeholder {
    color: #000;
}

.formulario .input input[type="submit"] {
    background: #000;
    color: #fff;
    max-width: 100px;
    cursor: pointer;
    margin-bottom: 20px;
    font-weight: 600;
}

.olvidar {
    margin-top: 5px;
    color: #000;
}

.olvidar a {
    color: #000;
    font-weight: 600;
    text-decoration: none;
    margin-left: 8px;
}

.box .fondo {
    position: absolute;
    backdrop-filter: blur(5px);
    box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-right: 1px solid rgba(255, 255, 255, 0.2);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    background: rgba(225, 225, 225, 0.1);
    animation: animate 10s linear infinite;
    animation-delay: calc(-1s *var(--i));
}

@keyframes animate {
    0%,100%{
        transform: translateY(-40px);
    }
    50%{
        transform: translateY(40px);
    }
}


.box .fondo:nth-child(1) {
    background: #131938;
    top: -50px;
    width: 100px;
    height: 100px;
    right: -60px;
}

.box .fondo:nth-child(2) {
    background: #131938;
    background-size: 20%;
    top: 150px;
    width: 120px;
    height: 120px;
    left: -100px;
    z-index: 2;
}

.box .fondo:nth-child(3) {
    bottom: 50px;
    width: 80px;
    height: 80px;
    right: -60px;
    z-index: 2;
    background: #131938;
}

.box .fondo:nth-child(4) {
    bottom: -80px;
    width: 50px;
    height: 50px;
    left: 50px;
    z-index: 2;
    background: #131938;
}

.box .fondo:nth-child(5) {
    top: -80px;
    width: 60px;
    height: 60px;
    left: 140px;
    background: #131938;
}

    </style>
</head>
<body>
    
    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="fondo" style="--i:0;"></div>
            <div class="fondo" style="--i:1;"></div>
            <div class="fondo" style="--i:2;"></div>
            <div class="fondo" style="--i:3;"></div>
            <div class="fondo" style="--i:4;"></div>
            <div class="contenedor">
                <div class="formulario">
                    <h2>Iniciar</h2>
                    <form id="formulario" method="post" action="menu.php">
                        <div class="input">
                            <input name="usuario" type="text" placeholder="Usuario"  pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{3,15}$" title="Un nombre de usuario apropiado debe comenzar con una letra, contener letras, números, guiones bajos y puntos, y tener entre 3 y 15 caracteres de longitud" required>
                        </div>
                        <div class="input">
                            <input name="clave" type="password" placeholder="Contraseña" pattern="[a-zA-Z0-9]{4,15}" title="Una contraseña válida debe estar compuesta por letras y/o números y tener una longitud entre 6 y 15 caracteres" required>
                        </div>
                        <div class="input">
                            <input type="submit" value="Iniciar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>
