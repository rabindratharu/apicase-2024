document.addEventListener("DOMContentLoaded", function () {
  // function animatePath() {
  //   console.log("Running animation");

  //   // Step 1: Draw the path and add classes
  //   path.style.strokeDasharray = "192px 192px";
  //   path.style.strokeDashoffset = "0"; // Start drawing from the beginning

  //   billDiv.classList.add("active-box");
  //   invoiceDiv.classList.add("active-box");

  //   // Step 2: Retract path after a delay
  //   setTimeout(() => {
  //     path.style.strokeDashoffset = "-192px"; // Retract from end
  //   }, 2000);

  //   // Step 3: Reset for the next loop
  //   setTimeout(() => {
  //     path.style.transition = "none";
  //     path.style.strokeDasharray = "0 192px";
  //     path.style.strokeDashoffset = "0";

  //     // Remove the background classes
  //     billDiv.classList.remove("active-box");
  //     invoiceDiv.classList.remove("active-box");

  //     // Force reflow to apply reset
  //     void path.offsetWidth;

  //     // Reapply transition
  //     setTimeout(() => {
  //       path.style.transition =
  //         "stroke-dasharray 0.75s ease-out, stroke-dashoffset 0.65s ease-out";
  //     }, 10);
  //   }, 2750); // Matches the total animation duration
  // } []  animatePathVar(['apic5','apic10'],['.svg-apic10 path','.svg-apic5 path',],100,2750)
  function animatePathVar(divs, svgs, offSet, animationTime, delayDivs) {
    console.log("Running animation dynamic:::");
    svgs.map((svg) => {
      const path = document.querySelector(svg);
      path.style.strokeDasharray = `${offSet}px ${offSet}px`;
      path.style.strokeDashoffset = "0";
    });

    // const path = document.querySelector(svgPath);

    // Step 1: Draw the path and add classes

    // Start drawing from the beginning

    divs.map((div) => {
      const divToAddClass = document.getElementById(div);
      divToAddClass.classList.add("active-box");
    });
    setTimeout(() => {
      delayDivs.map((div) => {
        const divToAddClass = document.getElementById(div);
        divToAddClass.classList.add("active-box");
      });
    }, 750);
    // Step 2: Retract path after a delay
    setTimeout(() => {
      svgs.map((svg) => {
        const path = document.querySelector(svg);
        path.style.strokeDashoffset = `-${offSet}px`;
      });
      // path.style.strokeDashoffset = `-${offSet}px`; // Retract from end
    }, 2000);

    // Step 3: Reset for the next loop
    setTimeout(() => {
      svgs.map((svg) => {
        const path = document.querySelector(svg);
        path.style.transition = "none";
        path.style.strokeDasharray = `0 ${offSet}px`;
        path.style.strokeDashoffset = "0";
      });

      // Remove the background classes
      divs.map((div) => {
        const divToRemoveClass = document.getElementById(div);
        divToRemoveClass.classList.remove("active-box");
      });

      delayDivs.map((div) => {
        const divToRemoveClass = document.getElementById(div);
        divToRemoveClass.classList.remove("active-box");
      });

      // Force reflow to apply reset

      svgs.map((svg) => {
        const path = document.querySelector(svg);
        void path.offsetWidth;
      });
      // Reapply transition
      setTimeout(() => {
        svgs.map((svg) => {
          const path = document.querySelector(svg);
          path.style.transition =
            "stroke-dasharray 0.75s ease-out, stroke-dashoffset 0.6s ease-out";
        });
      }, 10);
    }, 2750); // Matches the total animation duration
  }
  function animationLoop() {
    animatePathVar(["apic1"], [".svg path"], 192, 2200, ["apic2"]);
    setTimeout(() => {
      animatePathVar(
        ["apic5"],
        [".svg-apic10 path", ".svg-apic5 path"],
        192,
        2750,
        ["apic10", "apic8"]
      );
      setTimeout(() => {
        animatePathVar(
          ["apic12"],
          [".svg-apic12 path", ".svg-apic7 path"],
          192,
          2750,
          ["apic7", "apic3"]
        );
        setTimeout(() => {
          animatePathVar(
            ["apic5"],
            [".svg-apic0 path", ".svg-apic9 path"],
            192,
            2750,
            ["apic0", "apic9"]
          );
          setTimeout(() => {
            animatePathVar(["apic8"], [".svg-apic8 path"], 192, 2750, [
              "apic10",
            ]);
          }, 2200);
        }, 2200);
      }, 2200);
    }, 2200);
  }
  let svgArray = [
    ".svg path",
    ".svg-apic10 path",
    ".svg-apic5 path",
    ".svg-apic12 path",
    ".svg-apic7 path",
    ".svg-apic0 path",
    ".svg-apic9 path",
    ".svg-apic8 path",
  ];
  svgArray.map((svg) => {
    const path = document.querySelector(svg);
    path.style.transition = "none";
    path.style.strokeDasharray = `0 192px`;
    path.style.strokeDashoffset = "0";
    path.style.transition =
      "stroke-dasharray 0.75s ease-out, stroke-dashoffset 0.6s ease-out";
  });
  animationLoop();
  setInterval(() => {
    animationLoop();
  }, 11000);
});
