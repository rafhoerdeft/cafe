class Turn {
  constructor (action) {
    this.action = action
  }

  exit () {
    this.animationsEnd = animationsEnd('[data-turn-exit]')
    document.documentElement.classList.add('turn-exit')
  }

  beforeEnter (event) {
    if (this.shouldAnimateEnter) {
      event.preventDefault()
      // this.animationsEnd.then(() => event.data.render())
    }
  }

  enter () {
    document.documentElement.classList.remove('turn-exit')

    if (this.shouldAnimateEnter) {
      document.documentElement.classList.add('turn-enter')
    }
  }

  complete () {
    animationsEnd('[data-turn-enter]').then(() => {
      document.documentElement.classList.remove('turn-enter')
    })
  }

  get shouldAnimateEnter () {
    return this.action !== 'restore'
  }
}

Turn.start = function () {
  for (var event in this.eventListeners) {
    addEventListener(event, this.eventListeners[event])
  }
}

Turn.stop = function () {
  for (var event in this.eventListeners) {
    removeEventListener(event, this.eventListeners[event])
  }
  this.currentTurn = void 0
}

Turn.eventListeners = {
  'turbolinks:visit': function (event) {
    this.currentTurn = new this(event.data.action)
    this.currentTurn.exit()
  }.bind(Turn),
  'turbolinks:before-render': function (event) {
    this.currentTurn.beforeEnter(event)
  }.bind(Turn),
  'turbolinks:render': function () {
    this.currentTurn.enter()
  }.bind(Turn),
  'turbolinks:load': function () {
    if (this.currentTurn) this.currentTurn.complete()
  }.bind(Turn)
}

function animationsEnd (selector) {
  const elements = document.querySelectorAll(selector)
  const promises = []

  elements.forEach((element) => {
    const promise = new Promise((resolve) => {
      function listener () {
        element.removeEventListener('animationend', listener)
        resolve ()
      }
      element.addEventListener('animationend', listener)
    })
    promises.push(promise)
  })

  return Promise.all(promises)
}
