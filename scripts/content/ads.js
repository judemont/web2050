const NB_IMAGES = 2;
const NB_ADS = rand(7, 15);
const MAX_WIDTH = 200;
const MIN_WIDTH = 200;

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

    const adsPerBorder = Math.round(NB_ADS / 2);
    const imgWidth = parseInt(img.style.width, 10);

    if (i < adsPerBorder) {
        // Right border
        img.style.bottom = (i * (90 / adsPerBorder)) + "vh";
        img.style.right = "10px";
        adLabel.style.bottom = (i * (90 / adsPerBorder) + 5) + "vh"; // Position the label slightly above the image
        adLabel.style.right = "10px"; // Align the label with the image
    } else if (i < adsPerBorder * 2) {
        // Left border
        const leftIndex = i - adsPerBorder;
        img.style.bottom = (leftIndex * (90 / adsPerBorder)) + "vh";
        img.style.left = "10px";
        adLabel.style.bottom = (leftIndex * (90 / adsPerBorder) + 5) + "vh"; // Position the label slightly above the image
        adLabel.style.left = "10px"; // Align the label with the image
    }


    document.body.appendChild(img);
    document.body.appendChild(adLabel);
}

function rand(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
