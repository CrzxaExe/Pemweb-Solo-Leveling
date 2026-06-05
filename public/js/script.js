const nav = document.querySelector("#siteNav");
const hero = document.querySelector(".hero");
const revealTargets = document.querySelectorAll(".novel-panel, .character-stage, .official-card");

function updateNavState() {
    const heroBottom = hero.getBoundingClientRect().bottom;
    nav.classList.toggle("is-floating", heroBottom <= 0);
}

const revealObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("is-visible");
                revealObserver.unobserve(entry.target);
            }
        });
    },
    {
        threshold: 0.18,
    }
);

revealTargets.forEach((target) => revealObserver.observe(target));

window.addEventListener("scroll", updateNavState, { passive: true });
window.addEventListener("load", updateNavState);