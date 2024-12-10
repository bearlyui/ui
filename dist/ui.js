(() => {
  // js/utils.js
  var useHeadingsAsLabelAndDescription2 = (el, prefix) => {
    const heading = el.querySelector("[data-ui-heading]");
    if (heading) {
      heading.setAttribute("x-bind:id", "$id('".concat(prefix, "-title')"));
      el.setAttribute("x-bind:aria-labelledby", "$id('".concat(prefix, "-title')"));
    }
    const subheading = el.querySelector("[data-ui-subheading]");
    if (subheading) {
      subheading.setAttribute("x-bind:id", "$id('".concat(prefix, "-description')"));
      el.setAttribute("x-bind:aria-describedby", "$id('".concat(prefix, "-description')"));
    }
  };

  // js/alert.js
  function alert_default(Alpine) {
    Alpine.data("uiAlert", () => ({
      open: true,
      init() {
        this.$nextTick(() => useHeadingsAsLabelAndDescription2(this.$el, "ui-alert"));
      },
      uiAlertAttributes: {
        "x-id"() {
          return ["ui-alert-title", "ui-alert-description"];
        },
        "x-show"() {
          return this.open;
        },
        "x-transition:enter": "transition ease-out duration-300",
        "x-transition:enter-start": "opacity-0 scale-75 translate-y-full",
        "x-transition:enter-end": "opacity-100 scale-[1.02] -translate-y-1",
        "x-transition:leave": "transition ease-in-out duration-300",
        "x-transition:leave-start": "opacity-100 scale-100 -translate-y-full",
        "x-transition:leave-end": "opacity-0 scale-75 translate-y-full"
      },
      uiAlertClose: {
        "x-ref": "closeButton",
        "@keyup.enter"() {
          return this.open = false;
        },
        "@keyup.space"() {
          return this.open = false;
        },
        "@click.prevent"() {
          return this.open = false;
        }
      }
    }));
  }

  // js/dialog.js
  function dialog_default(Alpine) {
    Alpine.data("uiDialog", () => ({
      open: false,
      removedAriaHidden: false,
      init() {
        this.$nextTick(() => useHeadingsAsLabelAndDescription(this.$el, "ui-dialog"));
      },
      openDialog() {
        this.open = true;
        if (this.$refs.dialog.hasAttribute("aria-hidden")) {
          this.$refs.dialog.removeAttribute("aria-hidden");
          this.removedAriaHidden = true;
        }
      },
      closeDialog() {
        var _a;
        this.open = false;
        this.removedAriaHidden && $refs.dialog.setAttribute("aria-hidden", "true");
        (_a = this.$refs.close) == null ? void 0 : _a.setAttribute("inert", "true");
      },
      uiDialogContainer: {
        "x-show"() {
          return this.open;
        },
        "x-trap.inert.noscroll"() {
          return this.open;
        },
        "x-on:keyup.escape.window"() {
          this.$refs.dialog.getAttribute("aria-hidden") === null && this.closeDialog();
        },
        "x-ref": "dialog",
        "x-id"() {
          return ["ui-dialog-title", "ui-dialog-description"];
        }
      },
      uiDialogOverlay: {
        "x-show"() {
          return this.open;
        },
        "x-transition:enter.opacity.delay.0ms": "",
        "x-transition:leave.delay.0ms.duration.0ms": "",
        "x-on:click.stop"() {
          return this.closeDialog();
        }
      },
      uiDialogContent: {
        "role": "dialog",
        "aria-modal": true,
        "x-ref": "content",
        "x-show"() {
          return this.open;
        },
        "x-transition:enter": "transition ease-out duration-150 delay-75 origin-bottom",
        "x-transition:enter-start": "opacity-0 transform scale-90 translate-y-4",
        "x-transition:enter-end": "opacity-100 transform scale-100 translate-y-0",
        "x-transition:leave.duration.0ms.delay.0ms": ""
      },
      uiDialogClose: {
        "inert": true,
        "x-ref": "close",
        "x-on:click": "closeDialog",
        "x-effect"() {
          return this.open && setTimeout(() => this.$el.removeAttribute("inert"), 100);
        }
      }
    }));
  }

  // js/dropdown.js
  function dropdown_default(Alpine) {
    Alpine.data("uiDropdown", () => ({
      open: false,
      focusableTrigger: null,
      activeItem: null,
      searchQuery: "",
      searchTimer: void 0,
      init() {
        this.$nextTick(() => {
          if (this.focusableTrigger.hasAttribute("id")) return;
          this.focusableTrigger.setAttribute("id", this.$id("dropdown-trigger"));
        });
      },
      openDropdown() {
        this.open = true;
        if (this.activeItem == null) {
          this.activeItem = this.$refs.content.firstElementChild;
        }
        this.$nextTick(() => this.$focus.focus(this.activeItem));
      },
      closeDropdown() {
        this.open = false;
        this.$nextTick(() => {
          if (this.focusableTrigger) {
            this.focusableTrigger.focus({ preventScroll: true });
          }
        });
      },
      toggle() {
        this.open ? this.closeDropdown() : this.openDropdown();
      },
      search(e) {
        if (!e.key || e.key.length > 1) {
          return;
        }
        this.searchQuery += e.key;
        const found = Array.from(this.$refs.content.children).find((child) => {
          return child.textContent.trim().toLowerCase().startsWith(this.searchQuery.toLowerCase());
        });
        if (found) {
          this.activeItem = found;
          this.$focus.focus(found);
        }
        this.resetSearch();
      },
      resetSearch() {
        clearTimeout(this.searchTimer);
        this.searchTimer = setTimeout(() => {
          this.searchQuery = "";
        }, 500);
      },
      uiTrigger: {
        "x-ref": "trigger",
        "x-init"() {
          this.focusableTrigger = this.$focus.getFirst();
        },
        "x-on:click.prevent"() {
          this.toggle();
        },
        "aria-haspopup": true,
        ":aria-expanded"() {
          return this.open;
        },
        ":aria-controls"() {
          return this.open && this.$id("dropdown-items");
        },
        ":id"() {
          return this.$id("dropdown-trigger");
        }
      },
      uiDropdownContent: {
        "x-transition": true,
        "x-ref": "content",
        "x-show"() {
          return this.open;
        },
        "x-trap"() {
          return this.open;
        },
        "x-on:keydown": "search",
        ":id"() {
          return this.$id("dropdown-items");
        },
        "role": "menu",
        "aria-orientation": "vertical",
        ":aria-labelledby"() {
          return this.$id("dropdown-trigger");
        },
        ":aria-activedescendant"() {
          return this.activeItem && this.activeItem.id;
        }
      },
      uiDropdownItem: {
        "role": "menuitem",
        ":id"() {
          return this.$id("dropdown-menu-item");
        },
        "@focus"() {
          this.activeItem = this.$el;
        },
        "@keydown.escape.stop.prevent"() {
          this.closeDropdown();
        },
        "@keydown.home.stop.prevent"() {
          this.$focus.within(this.$el.parentNode.closest("[role=menu]")).wrap().first();
        },
        "@keydown.end.stop.prevent"() {
          this.$focus.within(this.$el.parentNode.closest("[role=menu]")).wrap().last();
        },
        "@keydown.page-up.stop.prevent"() {
          this.$focus.within(this.$el.parentNode.closest("[role=menu]")).wrap().first();
        },
        "@keydown.page-down.stop.prevent"() {
          this.$focus.within(this.$el.parentNode.closest("[role=menu]")).wrap().last();
        },
        "@keydown.arrow-left.stop.prevent"() {
          this.$focus.within(this.$el.parentNode.closest("[role=menu]")).wrap().previous();
        },
        "@keydown.arrow-up.stop.prevent"() {
          this.$focus.within(this.$el.parentNode.closest("[role=menu]")).wrap().previous();
        },
        "@keydown.arrow-right.stop.prevent"() {
          this.$focus.within(this.$el.parentNode.closest("[role=menu]")).wrap().next();
        },
        "@keydown.arrow-down.stop.prevent"() {
          this.$focus.within(this.$el.parentNode.closest("[role=menu]")).wrap().next();
        },
        "@keydown.space.stop.prevent"() {
          this.$el.click();
        },
        "@keydown.enter.stop.prevent"() {
          this.$el.click();
        }
      }
    }));
  }

  // js/toggle.js
  function toggle_default(Alpine) {
    Alpine.data("uiToggle", (checked) => ({
      checked,
      uiToggleAttributes: {
        "x-modelable": "checked",
        "x-on:click"() {
          this.$refs.checkbox.click();
        },
        ":aria-checked"() {
          return this.checked;
        }
      }
    }));
  }

  // js/tooltip.js
  function tooltip_default(Alpine) {
    Alpine.data("uiTooltip", (title) => ({
      show: false,
      title,
      openHandler: null,
      closeHandler: null,
      init() {
        this.openHandler = () => {
          this.show = true;
        };
        this.closeHandler = () => {
          this.show = false;
        };
        this.trigger.addEventListener("mouseenter", this.openHandler);
        this.trigger.addEventListener("mouseleave", this.closeHandler);
      },
      destroy() {
        this.trigger.removeEventListener("mouseenter", this.openHandler);
        this.trigger.removeEventListener("mouseleave", this.closeHandler);
      }
    }));
  }

  // js/index.js
  var ui = function(alpine) {
    alert_default(alpine);
    dialog_default(alpine);
    dropdown_default(alpine);
    toggle_default(alpine);
    tooltip_default(alpine);
  };

  // js/cdn.js
  document.addEventListener("alpine:init", () => {
    ui(window.Alpine);
  });
})();
//# sourceMappingURL=ui.js.map
