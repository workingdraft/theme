import Player from "wd-audio-player";
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
  constructor(element, data, callback) {
    this.element = element;
    this.data = data;
    this.callback = callback;
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
  }

  handleCallback() {
    const audioElement = this.element.querySelector('audio');

    audioElement.addEventListener("loadeddata", () => this.callback());
  }

  render() {
    const content = this.getTemplate();
    const fragment = this.createFragment(content);

    this.element.appendChild(fragment);
    this.handleCallback(fragment);
  }
}

export default () => {
  const elements = M.getElements(name);

  // time: '.podpress_mediafile_dursize_audio_mp3'

  elements.forEach(element => {
    const link = element.querySelector('.podpress_downloadimglink_audio_mp3');
    const player = M.getElements(`${name}-player`);

    new Revision(player[0], {
      fileUrl: link.href,
    }, () => {
      new Player(player[0], config).initialize();
    }).render();
  });
};
