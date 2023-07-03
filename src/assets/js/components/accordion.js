document.addEventListener('DOMContentLoaded', function() {
    function accordion_section() {
        var titles = document.querySelectorAll('.accordion .title');
        var sections = document.querySelectorAll('.accordion .section-content');
        titles.forEach(function(title) {
            title.classList.remove('active');
        });
        sections.forEach(function(section) {
            section.style.display = 'none';
            section.classList.remove('open');
        });
    }

    var titleElements = document.querySelectorAll('.accordion .title');
    titleElements.forEach(function(title) {
        title.addEventListener('click', function(e) {
            var icon = document.querySelector(".icon-rotate")
            var currentSection = this.nextElementSibling;

            if (currentSection.classList.contains('hidden')) {
                accordion_section();
                this.classList.add('active');
                currentSection.style.display = 'block';
                currentSection.classList.remove('hidden');
                accordion.classList.add('shadow-lg');
                icon.classList.add('rotate-180');
                icon.classList.add('transform-gpu');
            } else {
                this.classList.remove('active');
                currentSection.style.display = 'none';
                currentSection.classList.add('hidden');
                icon.classList.remove('rotate-180');
                icon.classList.remove('transform-gpu');
            }

            e.preventDefault();
        });
    });
});