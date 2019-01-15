import Audio from "wd-audio-player";
import M from "../utils/M";

const config = {
  title: '',
  artist: 'Working Draft',
  album: 'Working Draft',
  artwork: [{
      src: 'https://dummyimage.com/96x96',
      sizes: '96x96',
    },
    {
      src: 'https://dummyimage.com/128x128',
      sizes: '128x128',
    },
    {
      src: 'https://dummyimage.com/192x192',
      sizes: '192x192',
    },
    {
      src: 'https://dummyimage.com/256x256',
      sizes: '256x256',
    },
    {
      src: 'https://dummyimage.com/384x384',
      sizes: '384x384',
    },
    {
      src: 'https://dummyimage.com/512x512',
      sizes: '512x512',
    }
  ],
};

const name = 'revision';

class Revision {
  constructor(element, data) {
    this.element = element;
    this.data = data;
  }

  getTemplate() {
    const { fileUrl } = this.data;

    const template = `
      <audio preload="auto" data-audio-player>
        <source src="${fileUrl}" type="audio/mpeg">
      </audio>
    `;

    return template.trim();
  }

  createFragment(content) {
    const fragment = document.createDocumentFragment();
    const element = document.createElement('div');
    element.innerHTML = content;
    fragment.appendChild(element);

    return fragment;
  };

  render() {
    const content = this.getTemplate();
    const fragment = this.createFragment(content)

    this.element.appendChild(fragment);
  }
}

export default () => {
  const elements = M.getElements(name);

  elements.forEach(element => {
    new Revision(element, {
      fileUrl: 'https://workingdraft.de/wp-content/uploads/mp3/wd-373.mp3',
    }).render();

    new Audio.Player(element, config).initialize();
  });
};
