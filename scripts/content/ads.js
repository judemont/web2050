const NB_IMAGES = 2;
const NB_ADS = rand(5, 10);
const MAX_WIDTH = 300;
const MIN_WIDTH = 50;

for (let i = 0; i < NB_ADS; i++) {
    const IMAGE_NAME = rand(1, NB_IMAGES) + ".png";
    const img = document.createElement("img");
    img.src = browser.runtime.getURL('images/ads/' + IMAGE_NAME);
    img.style.position = "fixed";
    img.style.width = rand(MIN_WIDTH, MAX_WIDTH) + "px";
    img.style.cursor = "pointer";
    img.style.border = '1px solid #dadce0';
    img.style.borderRadius = '1px';
    img.style.padding = '2px';
    img.style.backgroundColor = '#FFFFFF';

    const adLabel = document.createElement('span');
    adLabel.textContent = 'Ad';
    adLabel.style.position = 'fixed';
    adLabel.style.background = '#1a73e8';
    adLabel.style.color = 'white';
    adLabel.style.fontSize = '10px';
    adLabel.style.fontWeight = '500';
    adLabel.style.padding = '2px 6px';
    adLabel.style.borderRadius = '3px';
    adLabel.style.textTransform = 'uppercase';
    adLabel.style.fontFamily = 'Arial, sans-serif';
    adLabel.style.letterSpacing = '0.5px';
    adLabel.style.zIndex = '10001';

    const position = rand(0, 3);
    const randomPosition = rand(3, 97);

    switch (position) {
        case 0:
            img.style.top = "20px";
            img.style.left = randomPosition + "vw";
            adLabel.style.top = "28px";
            adLabel.style.left = (randomPosition + 0.8) + "vw";
            break;
        case 1:
            img.style.bottom = img.height + "px";
            img.style.left = randomPosition + "vw";
            adLabel.style.bottom = "28px"
            adLabel.style.left = (randomPosition + 0.8) + "vw";
            break;
        case 2:
            img.style.top = randomPosition + "vh";
            img.style.left = img.width + "px";
            adLabel.style.top = (randomPosition + 0.8) + "vh";
            adLabel.style.left = "28px";
            break;
        case 3:
            img.style.top = randomPosition + "vh";
            img.style.right = img.width + "px";
            adLabel.style.top = (randomPosition + 0.8) + "vh";
            adLabel.style.right = "28px";
            break;
        default:
            break;
    }

    document.body.appendChild(img);
    document.body.appendChild(adLabel);
}

function rand(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
