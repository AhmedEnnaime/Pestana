//Utility functions
const qs = elem => document.querySelector(elem);
const qsAll = elem => document.querySelectorAll(elem);

// Collapsing FQS Panel
qsAll('.collapse-btn').forEach(x => {
  x.addEventListener('click', (e) => {
    let panel = e.target.parentNode.nextElementSibling
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
      e.target.style.transform = "rotate(0deg)";
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
      e.target.style.transform = "rotate(180deg)";
    }
  });
});
