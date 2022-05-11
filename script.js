// Toggle Menu - Navbar
const toggleMenu = document.querySelector('.toggle-menu');
const slide = document.querySelector('nav ul');
toggleMenu.addEventListener('click', function() {
    toggleMenu.classList.toggle('hamburger-menu');
    slide.classList.toggle('slide');
});

// Window Scroll - Navbar
window.addEventListener("scroll", function(){
    const nav = document.querySelector("nav");
    nav.classList.toggle("scroll-navbar", window.scrollY > 10);
});


// Settings Section Title
const aboutTitle = document.querySelector('.about #title h2');
const experienceTitle = document.querySelector('.experience #title h2');
const publicationTitle = document.querySelector('.publication #title h2');
const awardTitle = document.querySelector('.award #title h2');

aboutTitle.textContent = 'about';
experienceTitle.textContent = 'experience';
publicationTitle.textContent = 'publication';
awardTitle.textContent = 'scholarships, honors, and awards';

// Style H2
const titleH2 = document.querySelectorAll('#title h2');
for (let i = 0; i < titleH2.length; i++) {
    titleH2[i].style.fontWeight = '600';
    titleH2[i].style.textTransform = 'capitalize';
}


// Adding Element <hr>
const parentHr = document.querySelectorAll('.section #title');
for (let i = 0; i < parentHr.length; i++) {
    const hr = document.createElement('hr');
    parentHr[i].appendChild(hr);
    hr.style.opacity = '1';
    hr.style.height = '4px';
    hr.style.borderRadius = '4px';
    hr.style.width = '5rem';
    hr.style.background = 'linear-gradient(to right, #EC2F4B, #009FFF)';
    hr.style.margin = '0';
    hr.style.marginTop = '0.3rem';
}

// Subtitle (H2)- Accordion Menu
const subtitle = document.querySelectorAll('.subtitle h4');
const subtitleText = [
    'Work Experience', // 0
    'Social And Organization Activity', // 1
    'Education', // 2
    'Research', // 3
    'Roles in Project', // 4
    'Invited Speaker', // 5
    'Reviewer Experience', // 6
    'Presentation', // 7
    'Papers Presented In Conferences And Events', // 8
    'Written Book & Book Chapter', // 9
    'Scientific Articles', // 10
    'Scholarships', // 11
    'Honors', // 12
    'Awards' // 13
];

for (let i = 0; i < subtitle.length; i++) {
    for (let t = 0; t < subtitleText.length; t++){
        const text = document.createTextNode(subtitleText[t]);
    }
}
subtitle[0].append(subtitleText[0]);
subtitle[1].append(subtitleText[1]);
subtitle[2].append(subtitleText[2]);
subtitle[3].append(subtitleText[3]);
subtitle[4].append(subtitleText[4]);
subtitle[5].append(subtitleText[5]);
subtitle[6].append(subtitleText[6]);
subtitle[7].append(subtitleText[7]);
subtitle[8].append(subtitleText[8]);
subtitle[9].append(subtitleText[9]);
subtitle[10].append(subtitleText[10]);
subtitle[11].append(subtitleText[11]);
subtitle[12].append(subtitleText[12]);
subtitle[13].append(subtitleText[13]);

// Accordion Menu
const accordion = document.getElementsByClassName('accordion');
for (i = 0; i < accordion.length; i++) {
    accordion[i].addEventListener('click', function(){
        this.classList.toggle ('active')
    })
}