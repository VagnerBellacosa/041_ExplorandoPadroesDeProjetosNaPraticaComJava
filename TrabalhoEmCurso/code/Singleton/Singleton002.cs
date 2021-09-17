 class MyClass
 {
    private:
       // atributo estático da "instância única"
       static MyClass* instance = 0;
       // construtor privado: não pode ser utilizado fora da classe
       MyClass() {}

    public:
       // função-membro que retorna sempre a mesma instância do objeto
       static MyClass& getInstance()
       {
          if (!instance) instance = new MyClass();
          return *instance;
       }
 };