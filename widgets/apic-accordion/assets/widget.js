document.addEventListener("DOMContentLoaded", () => {
  class Accordion {
    constructor(el, multiple = false) {
      this.el = el;
      this.multiple = multiple;

      // Get all accordion headings
      const links = this.el.querySelectorAll(".apicbase-image-heading");

      // Attach click event to each heading
      links.forEach((link) => {
        link.addEventListener("click", (e) => this.toggleDropdown(e, link));
      });
    }

    toggleDropdown(event, link) {
      // Find the next sibling (the submenu)
      const nextElement = link.nextElementSibling;

      if (nextElement) {
        // Toggle the visibility of the submenu
        nextElement.style.display =
          nextElement.style.display === "block" ? "none" : "block";
      }

      // Toggle the 'accordion-open' class on the parent element
      link.parentElement.classList.toggle("accordion-open");

      // If not multiple, close other accordions
      if (!this.multiple) {
        const allSubmenus = this.el.querySelectorAll(".accordion-submenu");
        allSubmenus.forEach((submenu) => {
          if (submenu !== nextElement) {
            submenu.style.display = "none";
            submenu.parentElement.classList.remove("accordion-open");
          }
        });
      }
    }
  }

  // Initialize the accordion
  const accordionContainer = document.querySelector(
    ".apicbase-image-accordion"
  );
  if (accordionContainer) {
    new Accordion(accordionContainer, false);
  }
});
