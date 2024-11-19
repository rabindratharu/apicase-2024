document.addEventListener("DOMContentLoaded", () => {
  // Adjust line numbers based on a custom index
  document.querySelectorAll("pre.line-numbers").forEach((pre) => {
    const startIndex = parseInt(pre.getAttribute("data-start-index")) || 1; // Default to 1
    const linesContainer = pre.querySelector(".line-numbers-rows");

    if (linesContainer) {
      // Add custom line numbers starting at startIndex
      Array.from(linesContainer.children).forEach((line, index) => {
        line.style.counterReset = `line ${startIndex + index - 1}`; // Adjust line numbering
      });
    }
  });
});
