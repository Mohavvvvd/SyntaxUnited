// Write your Code here
const letters = document.querySelectorAll(".DOMCL h1 span");
const paragraph = document.querySelector(".DOMCL p");
const button = document.querySelector(".DOMCL button");
const DOMCL = document.querySelector(".DOMCL");


window.addEventListener("DOMContentLoaded" , () => {
    initializeLettersAnimation();
    setTimeout(animateLettersAppearance,100);
    setTimeout(() => {
        animateParagraphAndButtonAppearance();
        setTimeout(() => {
            button.addEventListener("click", () => {
                DOMCL.style.transition = "all ease 1s";
                DOMCL.style.transform = "translateY(-100%)";
            });
        },0);
      }, 2000);
    
})


const animateLettersAppearance = () => {
    letters.forEach((letter, i) => {
      letter.style.transitionDelay = i * 0.05 + "s";
    });
  
    letters.forEach((letter, i) => {
      letter.style.transform = "translateY(0px) rotate(0) scale(1)";
      letter.style.opacity = "1";
    });
  };
  



const initializeLettersAnimation = () => {
    let x = -1;
    let y = 1;
  
    letters.forEach((letter, i) => {
      letter.style.transform = `translate(${200 * y}px, ${100 * x}px) rotate(360deg) scale(0.1)`;
      x = x * -1;
      y = y * x;
    });
  };
  
  const animateParagraphAndButtonAppearance = () => {
    letters.forEach((letter) => {
      letter.classList.remove('active');
    });
  
    paragraph.style.transform = "translateY(0px)";
    paragraph.style.opacity = "1";
    setTimeout(() => {
        button.style.transform = "translateY(0px)";
        button.style.opacity = "1";
      }, 300);
    
  };