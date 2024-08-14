const allStories = [
  {
    thumbUrl: "public/assets/frontend/images/news/1-thumb.png",
    imageUrl: "public/assets/frontend/images/news/1.png",
    title: "Title No. 1",
  },

  {
    thumbUrl: "public/assets/frontend/images/news/2-thumb.png",
    imageUrl: "public/assets/frontend/images/news/2.png",
    title: "Title No. 2",
  },

  {
    thumbUrl: "public/assets/frontend/images/news/3-thumb.png",
    imageUrl: "public/assets/frontend/images/news/3.png",
    title: "Title No. 3",
  },

  {
    thumbUrl: "public/assets/frontend/images/news/4-thumb.png",
    imageUrl: "public/assets/frontend/images/news/4.png",
    title: "Title No. 4",
  },

  {
    thumbUrl: "public/assets/frontend/images/news/5-thumb.png",
    imageUrl: "public/assets/frontend/images/news/5.png",
    title: "Title No. 5",
  },

  {
    thumbUrl: "public/assets/frontend/images/news/6-thumb.png",
    imageUrl: "public/assets/frontend/images/news/6.png",
    title: "Title No. 6",
  },

  {
    thumbUrl: "public/assets/frontend/images/news/7-thumb.png",
    imageUrl: "public/assets/frontend/images/news/7.png",
    title: "Title No. 7",
  },

  {
    thumbUrl: "public/assets/frontend/images/news/8-thumb.png",
    imageUrl: "public/assets/frontend/images/news/8.png",
    title: "Title No. 8",
  },
];

const storiesContainer = document.querySelector(".stories-container");
const storyFull = document.querySelector(".story-full");
const storyFullImage = document.querySelector(".story-full img");
const storyFullTitle = document.querySelector(".story-full .title");
const closeBtn = document.querySelector(".story-full .close-btn");
const leftArrow = document.querySelector(".story-full .left-arrow");
const rightArrow = document.querySelector(".story-full .right-arrow");

let currentIndex = 0;
let timer;

allStories.forEach((s, i) => {
  const content = document.createElement("div");
  content.classList.add("content");

  const img = document.createElement("img");
  img.setAttribute("src", s.thumbUrl);

  storiesContainer.appendChild(content);
  content.appendChild(img);

  content.addEventListener("click", () => {
    currentIndex = i;
    storyFull.classList.add("active");
    storyFullImage.setAttribute("src", s.imageUrl);

    if (!s.title) {
      storyFullTitle.style.display = "none";
    } else {
      storyFullTitle.style.display = "block";
      storyFullTitle.innerHTML = s.title;
    }

    clearInterval(timer);
    timer = setInterval(nextStory, 5000);
  });
});

closeBtn.addEventListener("click", () => {
  storyFull.classList.remove("active");
});

leftArrow.addEventListener("click", () => {
  if (currentIndex > 0) {
    currentIndex -= 1;

    storyFullImage.setAttribute("src", allStories[currentIndex].imageUrl);

    if (!allStories[currentIndex].title) {
      storyFullTitle.style.display = "none";
    } else {
      storyFullTitle.style.display = "block";
      storyFullTitle.innerHTML = allStories[currentIndex].title;
    }

    clearInterval(timer);
    timer = setInterval(nextStory, 5000);
  }
});

const nextStory = () => {
  if (currentIndex < allStories.length - 1) {
    currentIndex += 1;

    storyFullImage.setAttribute("src", allStories[currentIndex].imageUrl);

    if (!allStories[currentIndex].title) {
      storyFullTitle.style.display = "none";
    } else {
      storyFullTitle.style.display = "block";
      storyFullTitle.innerHTML = allStories[currentIndex].title;
    }
  }
};

rightArrow.addEventListener("click", () => {
  nextStory();
  clearInterval(timer);
  timer = setInterval(nextStory, 5000);
});
