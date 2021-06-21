import Component from "@glimmer/component";
import { tracked } from "@glimmer/tracking";
import { action, set } from "@ember/object";

export default class TodoAppComponent extends Component {
  @tracked
  text = "";

  @tracked
  change = false;

  @action
  submit(model, event) {
    event.preventDefault();
    const i = model[model.length - 1].id + 1;
    const newTodo = {
      id: i,
      todo: this.text
    };
    model.pushObject(newTodo);
  }

  @action
  onChange(e) {
    this.text = e.target.value;
  }

  @action
  delete(model, item) {
    const index = model
      .map((file, index) => {
        if (file.id === item.id) {
          set(item, "id", null);
          set(item, "todo", null);
          return index;
        }
      })
      .filter(id => id !== undefined);
    model.splice(index[0], 1);
  }

  @action
  edit(model, item, event) {
    event.preventDefault();
    if (this.change === false) {
      this.change = true;
    } else {
      set(item, "todo", this.text);
      this.change = false;
    }
  }
}
