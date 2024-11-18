document.addEventListener("DOMContentLoaded", function () {
  // Function to animate SVG paths and divs dynamically
  function animatePathVar(divs, svgs, offSet, animationTime, delayDivs) {
    console.log("Running animation dynamic:::");

    // Step 1: Draw the paths and add classes
    svgs.forEach((svg) => {
      const path = document.querySelector(svg);
      if (path) {
        path.style.strokeDasharray = `${offSet}px ${offSet}px`;
        path.style.strokeDashoffset = "0"; // Start drawing from the beginning
      }
    });

    divs.forEach((div) => {
      const divToAddClass = document.getElementById(div);
      if (divToAddClass) divToAddClass.classList.add("active-box");
    });

    setTimeout(() => {
      delayDivs.forEach((div) => {
        const divToAddClass = document.getElementById(div);
        if (divToAddClass) divToAddClass.classList.add("active-box");
      });
    }, 750);

    // Step 2: Retract paths after a delay
    setTimeout(() => {
      svgs.forEach((svg) => {
        const path = document.querySelector(svg);
        if (path) path.style.strokeDashoffset = `-${offSet}px`; // Retract from end
      });
    }, animationTime - 750);

    // Step 3: Reset for the next loop
    setTimeout(() => {
      svgs.forEach((svg) => {
        const path = document.querySelector(svg);
        if (path) {
          path.style.transition = "none";
          path.style.strokeDasharray = `0 ${offSet}px`;
          path.style.strokeDashoffset = "0";

          // Force reflow to apply reset
          void path.offsetWidth;

          // Reapply transition
          setTimeout(() => {
            path.style.transition =
              "stroke-dasharray 0.75s ease-out, stroke-dashoffset 0.6s ease-out";
          }, 10);
        }
      });

      divs.forEach((div) => {
        const divToRemoveClass = document.getElementById(div);
        if (divToRemoveClass) divToRemoveClass.classList.remove("active-box");
      });

      delayDivs.forEach((div) => {
        const divToRemoveClass = document.getElementById(div);
        if (divToRemoveClass) divToRemoveClass.classList.remove("active-box");
      });
    }, animationTime); // Matches the total animation duration
  }

  // Fetch dynamic animation data
  function fetchAnimationData() {
    // Simulating fetching data from a dynamic source (e.g., API or JSON)
    return [
      {
        divs: ["apic1"],
        svgs: [".svg path"],
        offSet: 192,
        animationTime: 2200,
        delayDivs: ["apic2"],
      },
      {
        divs: ["apic5"],
        svgs: [".svg-apic10 path", ".svg-apic5 path"],
        offSet: 192,
        animationTime: 2750,
        delayDivs: ["apic10", "apic8"],
      },
      {
        divs: ["apic12"],
        svgs: [".svg-apic12 path", ".svg-apic7 path"],
        offSet: 192,
        animationTime: 2750,
        delayDivs: ["apic7", "apic3"],
      },
      {
        divs: ["apic5"],
        svgs: [".svg-apic0 path", ".svg-apic9 path"],
        offSet: 192,
        animationTime: 2750,
        delayDivs: ["apic0", "apic9"],
      },
      {
        divs: ["apic8"],
        svgs: [".svg-apic8 path"],
        offSet: 192,
        animationTime: 2200,
        delayDivs: ["apic10"],
      },
    ];
  }

  // Main animation loop
  function animationLoop(animationData) {
    let totalDelay = 0;

    animationData.forEach((item) => {
      setTimeout(() => {
        animatePathVar(
          item.divs,
          item.svgs,
          item.offSet,
          item.animationTime,
          item.delayDivs
        );
      }, totalDelay);

      // Add the animation time to the total delay for the next step
      totalDelay += item.animationTime;
    });
  }

  // Initialize and reset SVG paths
  function resetPaths(svgArray, offSet) {
    svgArray.forEach((svg) => {
      const path = document.querySelector(svg);
      if (path) {
        path.style.transition = "none";
        path.style.strokeDasharray = `0 ${offSet}px`;
        path.style.strokeDashoffset = "0";
        path.style.transition =
          "stroke-dasharray 0.75s ease-out, stroke-dashoffset 0.6s ease-out";
      }
    });
  }

  // Main execution
  const svgArray = [
    ".svg path",
    ".svg-apic10 path",
    ".svg-apic5 path",
    ".svg-apic12 path",
    ".svg-apic7 path",
    ".svg-apic0 path",
    ".svg-apic9 path",
    ".svg-apic8 path",
  ];

  // Fetch dynamic data and start animation
  const animationData = fetchAnimationData();

  // Reset all paths initially
  resetPaths(svgArray, 192);

  // Start the animation loop
  animationLoop(animationData);

  // Repeat the animation every 11 seconds
  setInterval(() => {
    animationLoop(animationData);
  }, 11000);
});
