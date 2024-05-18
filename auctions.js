
/* hopefully for next time
const IMAGE0 =
  "https://i.picsum.photos/id/229/400/200.jpg?hmac=ULnwo8IFtjR3PshWPNEvFWNU8Xwl_OIeUtVmZIQanhU"
const IMAGE1 =
  "https://i.picsum.photos/id/154/400/200.jpg?hmac=uhKcJIPoFcq2xMC16yvZAwA8sTeIbThUr-Njq0DkhSU"
const IMAGE2 =
  "https://i.picsum.photos/id/690/400/200.jpg?hmac=kOkDXkZEUaSUQviVm67apRu5EPMD_L0rHfKVt32iogQ"
const IMAGE3 =
  "https://i.picsum.photos/id/633/400/200.jpg?hmac=-axbA3Zg3r_xPYOy7OdaIb5yTFDBKubd9LYJrnwpHeU"

const images = [IMAGE0, IMAGE1, IMAGE2, IMAGE3]

const image0 = document.getElementById("image0")
const image1 = document.getElementById("image1")
const image2 = document.getElementById("image2")
const image3 = document.getElementById("image3")

const lightbox = document.getElementById("lightbox")

const previewImg = document.getElementById("preview-image")

const modalImagesBlock = document.getElementById(
  "modal-images-block"
)

image0.src = IMAGE0
image1.src = IMAGE1
image2.src = IMAGE2
image3.src = IMAGE3

let activeId = null
previewImg.src = images[0]

const modalImagesElements =
  modalImagesBlock.getElementsByTagName("img")

const modalImages = Object.values(modalImagesElements)

modalImages.forEach((imageElement, i) => {
  console.log(imageElement)
  imageElement.src = images[i]
})

function openModal(imgId) {
  if (activeId !== null) {
    modalImages[activeId].classList.remove("active")
  }

  activeId = imgId

  lightbox.classList.add("visible")

  previewImg.src = images[imgId]

  modalImages[imgId].classList.add("active")
}

function closeModal() {
  lightbox.classList.remove("visible")
}

function control(direction) {
  const prevId = activeId
  if (direction === 1) {
    // next
    activeId =
      activeId + 1 > images.length - 1
        ? // then go to the beginning
          (activeId = 0)
        : (activeId = activeId + 1)
  } else {
    // previous
    activeId =
      activeId - 1 < 0
        ? // then go to the end
          (activeId = images.length - 1)
        : activeId - 1
  }

  previewImg.src = images[activeId]
  modalImages[activeId].classList.add("active")
  modalImages[prevId].classList.remove("active")
}
*/