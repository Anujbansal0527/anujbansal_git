// Register ScrollTrigger
gsap.registerPlugin(ScrollTrigger);

// GSAP animation
gsap.to(".laptop", {
  scrollTrigger: {
    trigger: ".banner",
    start: "top top",
    end: "bottom top",
    scrub: true,
  },
  rotationX: 60, // Rotates laptop lid to "open" it
  ease: "power1.inOut",
});
