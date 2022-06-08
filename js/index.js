$(document).ready(function(){
    let names = ["Zildjian Lee G. Loren", "John Herson L. Radones", "Jan Marichie Z. Mojica", "Bernard V. Sapida"];
    let quotes = [
        "We come up with new and creative ways to delight our customers and meet their needs.",
        "We make a difference in the neighbourhoods and communities that we serve.",
        "Our employees understand that not only do they have a job with BurgerHub, but they also understand they can grow that job into a career.",
        "Individual commitment to a team effort that is what makes a team work, a company work, a society work, and a civilization work.",
    ];
    let positions = ["Manager", "Head Chef", "Assistant Chef", "Chief Executive Officer"];
    let signatures = [
        "images/signature/Signature_Loren.png",
        "images/signature/Signature_Radones.png",
        "images/signature/Signature_Mojica.png",
        "images/signature/Signature_Sapida.png"
    ];
    let index = 0;

    setInterval(function(){
        $('#name').text(names[index]).hide();
        $('#quote').text(quotes[index]).hide();
        $('#position').text(positions[index]).hide();
        $("#signature").attr('src', signatures[index]).hide();

        $('#name').text(names[index]).fadeIn(1350);
        $('#quote').text(quotes[index]).fadeIn(1350);
        $('#position').text(positions[index]).fadeIn(1350);
        $("#signature").attr('src', signatures[index]).fadeIn(1350);
        index++;
        index = index == 4 ? 0 : index;
    }, 5000);
});