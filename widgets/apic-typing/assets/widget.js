document.addEventListener("DOMContentLoaded", () => {
  const codeLines = [
    "const rigorous = require.programmers('-');",
    "    const coffee = require('black-coffee');",
    "    const laptop = require('dell-i3');",
    "    await projects.wordpress.create({",
    "      hours: 2000,",
    "      talent: 'infinity',",
    "    });",
  ];

  const typingDelay = 50;
  const lineDelay = 800;
  const codeBlock = document.querySelector("#code-content");
  const autocompleteBox = document.querySelector("#autocomplete-box");
  let caret = `<span class="typing-caret"></span>`;

  let allTypedCode = ""; //
  async function typeCode(lines) {
    for (let line of lines) {
      await typeLine(line);
      if (lines.indexOf(line) < lines.length - 1)
        await new Promise((resolve) => setTimeout(resolve, lineDelay));
    }

    codeBlock.innerHTML =
      Prism.highlight(allTypedCode, Prism.languages.javascript, "javascript") +
      caret;
    Prism.highlightElement(codeBlock);
  }

  async function typeLine(line) {
    let typedLine = allTypedCode + "";

    for (let char of line) {
      await new Promise((resolve) => setTimeout(resolve, typingDelay));
      typedLine += char;
      allTypedCode = typedLine;
      codeBlock.innerHTML =
        Prism.highlight(
          allTypedCode,
          Prism.languages.javascript,
          "javascript"
        ) + caret;
      Prism.highlightElement(codeBlock);
    }

    allTypedCode = allTypedCode + "\n";
  }

  function positionAutocomplete() {
    const caretElement = document.querySelector(".typing-caret");
    const caretRect = caretElement.getBoundingClientRect();
    autocompleteBox.style.top = `${
      caretRect.top + window.scrollY + caretRect.height - 30
    }px`;
    autocompleteBox.style.left = `${caretRect.left + window.scrollX}px`;
    setTimeout(() => {
      autocompleteBox.style.display = "none";
    }, [1500]);
  }

  typeCode(codeLines);
});
