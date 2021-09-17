class MyClass {
  private static instance: MyClass | undefined;

  private constructor() {}

  public static getInstance(): MyClass {
    if (!this.instance) {
      return new MyClass();
    } else {
      return this.instance;
    }
  }
}