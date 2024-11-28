document.addEventListener("DOMContentLoaded", () => {
  class Accordion {
    constructor(el, multiple = false) {
      this.el = el;
      this.multiple = multiple;

      // Get all accordion headings
      const links = this.el.querySelectorAll(".apicbase-image-heading");

      // Attach click event to each heading
      links.forEach((link) => {
        link.addEventListener("click", (e) => this.toggleDropdown(link));
      });
    }

    toggleDropdown(link) {
      // Find the next sibling (the submenu)
      const submenu = link.nextElementSibling;

      if (submenu) {
        // Toggle the visibility of the submenu
        submenu.style.display =
          submenu.style.display === "block" ? "none" : "block";

        // Toggle the 'elementor-active' class on the parent element
        link.parentElement.classList.toggle("elementor-active");
      }

      // If not multiple, close other accordions
      if (!this.multiple) {
        const allItems = this.el.querySelectorAll(".apicbase-image-heading");

        allItems.forEach((item) => {
          const itemSubmenu = item.nextElementSibling;

          if (item !== link && itemSubmenu) {
            itemSubmenu.style.display = "none";
            item.parentElement.classList.remove("elementor-active");
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
