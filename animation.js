gsap.from("#motoimg", {
    opacity: 0,
    scale: 0,
    duration: 2.5,
    scrollTrigger: {
        trigger: "#motoimg",
        scroller: "body",
        start: "top 80%",
        end: "top 60%",


        scrub: 1


    }
});

gsap.from("#left-side-properties span", {
    opacity: 0,
    scale: 0,
    x: -300,
    duration: 2,
    stagger: 1.5,
    scrollTrigger: {
        trigger: "#left-side-properties span",
        scroller: "body",
        start: "top 50%",
        end: "top 50%",


        scrub: 1


    }
});

gsap.from("#right-side-properties span", {
    opacity: 0,
    scale: 0,
    x: 300,
    duration: 2,
    stagger: 1.5,
    scrollTrigger: {
        trigger: "#left-side-properties span",
        scroller: "body",
        start: "top 50%",
        end: "top 50%",


        scrub: 1


    }
});

