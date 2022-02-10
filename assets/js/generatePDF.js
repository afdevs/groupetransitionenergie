const { degrees, PDFDocument, rgb, StandardFonts } = PDFLib
    async function createPdf() {
        const formUrl = './completed/formulaire_images.pdf'
        // const formUrl = 'http://ecom_market.local/chauffageCalcForm/completed/formulaire_images.pdf'
        const formPdfBytes = await fetch(formUrl,{ mode: 'no-cors'}).then(res => res.arrayBuffer()).catch(error=> console.log('error', error))
        const pdfDoc = await PDFDocument.load(formPdfBytes)

        console.log(pdfDoc.context.header.toString());
        console.log('srcimg1', pdfDoc)
        console.log('srcimg1', formPdfBytes)

        /**
         * Ajout des images JPG seulement
         * Ce code n'accepte que les images .jpg
         */

        const srcimg1 = $("#facade_maison_img img")[0].getAttribute('src')
        const srcimg2 = $("#compteur_actuel_img img")[0].getAttribute('src')
        const srcimg3 = $("#chaudiere_actuel_img img")[0].getAttribute('src')
        const srcimg4 = $("#ballon_actuel_img img")[0].getAttribute('src')
        const srcimg5 = $("#emplacement_pompe_a_chaleur_img img")[0].getAttribute('src')
        const srcimg6 = $("#emplacement_des_blocs_exterieurs_img img")[0].getAttribute('src')
        
        const ImageBytes1 = await fetch(srcimg1).then(res => res.arrayBuffer())
        const ImageBytes2 = await fetch(srcimg2).then(res => res.arrayBuffer())
        const ImageBytes3 = await fetch(srcimg3).then(res => res.arrayBuffer())
        const ImageBytes4 = await fetch(srcimg4).then(res => res.arrayBuffer())
        const ImageBytes5 = await fetch(srcimg5).then(res => res.arrayBuffer())
        const ImageBytes6 = await fetch(srcimg6).then(res => res.arrayBuffer())

        console.log("$('#facade_maison_img img')[0].getAttribute('src')", $("#facade_maison_img img")[0].getAttribute('src'))
        console.log('srcimg1', srcimg1)
        // var bytes = new Uint8Array(formPdfBytes);
      
      
        const Image1 = await pdfDoc.embedJpg(ImageBytes1)
        const Image2 = await pdfDoc.embedJpg(ImageBytes2)
        const Image3 = await pdfDoc.embedJpg(ImageBytes3)
        const Image4 = await pdfDoc.embedJpg(ImageBytes4)
        const Image5 = await pdfDoc.embedJpg(ImageBytes5)
        const Image6 = await pdfDoc.embedJpg(ImageBytes6)
      
        const form = pdfDoc.getForm()
      
        const image1Field = form.getButton('image1')
        const image2Field = form.getButton('image2')
        const image3Field = form.getButton('image3')
        const image4Field = form.getButton('image4')
        const image5Field = form.getButton('image5')
        const image6Field = form.getButton('image6')
      
        image1Field.setImage(Image1)
        image2Field.setImage(Image2)
        image3Field.setImage(Image3)
        image4Field.setImage(Image4)
        image5Field.setImage(Image5)
        image6Field.setImage(Image6)
      

        // flatten fichier
        form.flatten();
        console.log('pdfDoc', pdfDoc)

        const pdfBytes = await pdfDoc.save("./completed/here.pdf")
        window.saveAs(pdfBytes, './completed/downloaded.pdf');


        // Trigger the browser to download the PDF document
        // download(pdfBytes, "pdf-lib_creation_example.pdf", "application/pdf");
    };
