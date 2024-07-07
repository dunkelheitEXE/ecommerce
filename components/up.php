<!-- HOME Gretting -->
 <style>
    

main {
    padding: 2rem;
}

section {
    margin: 2rem 0;
    padding: 2rem;
    background-color: #f4f4f4;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

h2 {
    margin-top: 0;
}

p {
    line-height: 1.6;
}

main section .blurer {
    width: 50%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

main section .blurer img {
    width: 100%;
    border-radius: 10px;
}
main section .blurer span {
    position: absolute;
}
main section .blurer:hover > img {
    filter: blur(5px);
    transition: 0.5s;
}

/* TEXT INSIDE OF BLURER */

main section .blurer span a {
    color: black;
}

main section .blurer span a:hover {
    text-shadow: 0 0 10px var(--color-orange);
    transition: 0.5s;
}

main section p {
    text-align: center;
    width: 70%;
    padding: 20px;
}

@media screen and (max-width: 1100px) {
    main section .blurer {
        width: 80%;
    }

    main section p {
        width: 100%;
    }

    .main-main img{
        width: 70%;
    }
}

@media screen and (max-width: 800px) {
    main section .blurer {
    width: 100%;
}
}

 </style>

 <div class="main-main">
    <div class="text-center">
        <img src="static/img/PONCE_01.webp" alt="" class="w-2">
    </div>
    <div style="text-align: center; width: 50%; margin: 35px auto 0 auto;">
        <h1 style="padding: 15px;">VIDI, VINI, VICI</h1>
        <span><i>“El éxito es la capacidad de ir de fracaso en fracaso sin perder el entusiasmo.”</i></span><br>
        <span>Winston Churchill</span>
    </div>
 </div>
    <main>
        <hr>
        <section id="section1">
            <h2>Sección 1</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, voluptas possimus ex excepturi laudantium eveniet ipsum error in! Recusandae iusto quidem ullam sint, placeat odit quae eius in delectus quod?</p>
            <div class="blurer">
                <img src="static/img/interior.jpeg" alt="">
                <span><a href="prdocuts.php"><b>Watch products</b></a></span>
            </div>
        </section>
        <section id="section2">
            <h2>Sección 2</h2>
            <p>Contenido de la Sección 2...</p>
            <div class="blurer">
                <img src="static/img/cajon1.webp" alt="">
                <span><a href="prdocuts.php"><b>Watch products</b></a></span></span>
            </div>
        </section>
        <section id="section3">
            <h2>Sección 3</h2>
            <p>Contenido de la Sección 3...</p>
            <div class="blurer">
                <img src="static/img/silla1.webp" alt="">
                <span><a href="prdocuts.php"><b>Watch products</b></a></span></span>
            </div>
        </section>
        <section id="section4">
            <h2>Sección 4</h2>
            <p>Contenido de la Sección 4...</p>
        </section>
    </main>