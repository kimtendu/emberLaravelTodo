import Route from "@ember/routing/route";

export default class TodoRoute extends Route {
  model() {
    return [
      {
        id: 1,
        todo: "todo 1"
      },
      {
        id: 2,
        todo: "todo 2"
      },
      {
        id: 3,
        todo: "todo 3"
      },
      {
        id: 4,
        todo: "todo 4"
      },
      {
        id: 5,
        todo: "todo 5"
      }
    ];
  }
}
