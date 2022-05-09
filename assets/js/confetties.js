// Confetti
$( document ).ready( function () {
    let myCanvas = document.createElement('canvas');
    myCanvas.style.position = "fixed";
    myCanvas.style.bottom = "0";
    myCanvas.style.left = "0";
    myCanvas.style.width = "100vw";
    myCanvas.style.height = "100vh";

    document.body.appendChild(myCanvas);

    let myConfetti = confetti.create(myCanvas, {
        resize: true,
        useWorker: true,
    });

    window.confetti = function () {
        myConfetti({
            particleCount: 80,
            angle: 60,
            spread: 100,
            origin: { x: -0.05, y: .90 }
            // any other options from the global
            // confetti function
        });

        myConfetti({
            particleCount: 80,
            angle: 120,
            spread: 100,
            origin: { x: 1.05, y: .90 }
            // any other options from the global
            // confetti function
        });

    }
});



