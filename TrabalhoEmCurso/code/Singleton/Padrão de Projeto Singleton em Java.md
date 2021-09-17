# Padrão de Projeto Singleton em Java

## Veja neste artigo os conceitos, funcionamento do Padrão de Projeto Singleton, um dos mais utilizados atualmente, com implementações práticas na linguagem Java.



### Introdução

Os Design Patterns (Padrões de Projetos) são arquiteturas testadas para construir softwares orientados a objetos flexíveis e sustentáveis. Os padrões ajudam a reduzir substancialmente a complexidade do processo de design.

Padrões de Projetos tem sua origem no trabalho de um arquiteto chamado Christopher Alexander que escreveu dois livros de bastante sucesso onde ele exemplificava o uso e descrevia seu raciocínio para documentar os padrões para a arquitetura. Porém em 1995 um grupo de quatro profissionais basearam-se em Christopher Alexander e escreveram o livro "Design Patterns: Elements of Reusable Object-Oriented Software" [Gamma95] que continha um catálogo com 23 padrões de projetos (Design Patterns) orientados a software. A idéia dos autores do livro era documentar problemas recorrentes que acontecia nos softwares.

[Os Design Patterns são uma coleção de padrões de projeto de software que contém soluções para problemas conhecidos e recorrentes no desenvolvimento de software descrevendo uma solução comprovada para um problema de projeto recorrente.](https://www.devmedia.com.br/curso/padroes-de-projeto-em-java/25) A Documentação desses padrões permite o reuso e o compartilhamento dessas informações sobre a melhor maneira de se resolver um problema de projeto de software.

Neste artigo será descrito um importante Padrão de Projeto muito utilizado pelos desenvolvedores de software que é o Singleton na qual será mais detalhado nas seções subseqüentes do artigo.

### Funcionamento

O padrão Singleton permite criar objetos únicos para os quais há apenas uma instância. Este padrão oferece um ponto de acesso global, assim como uma variável global, porém sem as desvantagens das variáveis globais. Para entendermos e usarmos bem o padrão de Projeto Singleton é necessário apenas dominar bem as variáveis e métodos de classe estáticos além dos modificadores de acesso.

[O Padrão Singleton](https://www.devmedia.com.br/utilizando-singleton-curso-de-java-basico-aplicacoes-desktop-33/25867) tem como definição garantir que uma classe tenha apenas uma instância de si mesma e que forneça um ponto global de acesso a ela. Ou seja, uma classe gerencia a própria instância dela além de evitar que qualquer outra classe crie uma instância dela. Para criar a instancia tem-se que passar pela classe obrigatoriamente, nenhuma outra classe pode instanciar ela. O Padrão Singleton também oferece um ponto global de acesso a sua instância. A própria classe sempre vai oferecer a própria instância dela e caso não tenha ainda uma instância, então ela mesma cria e retorna essa nova instância criada.

[O Diagrama de classe](https://www.devmedia.com.br/curso/introducao-a-construcao-de-diagrama-de-classes-da-uml/307) abaixo mostra mais detalhes sobre o funcionamento do padrão Singleton.

![Padrão Singleton](https://arquivo.devmedia.com.br/artigos/Higor_Medeiros/PadraoSingleton/PadraoSingleton_Java1.jpg)

**Figura 1**. Diagrama de classe do Padrão Singleton.

No diagrama de classe acima tem-se o atributo singleton que é do tipo da sua própria classe e é estático, nessa variável tem-se a única instância da classe. Nos métodos pode-se observar a presença do construtor da classe Singleton() que é PRIVADO. Ou seja, um construtor privado não permite que a classe seja instanciada a não ser que seja feito por ela mesmo na qual será instanciada pelo método getInstance() que é estático e assim pode ser acessado de qualquer outra classe sem precisar instanciar Singleton. No exemplo veremos mais uma peculiaridade do método getInstance().

### Exemplo de Implementação

Segue abaixo um exemplo de implementação em Java utilizando o Padrão Singleton.

**Listagem 1**: Exemplo de implementação do Padrão Singleton.

```
public class Singleton {

	private static Singleton uniqueInstance;

	private Singleton() {
	}

	public static synchronized Singleton getInstance() {
		if (uniqueInstance == null)
			uniqueInstance = new Singleton();

		return uniqueInstance;
	}
}
```

Acima temos a implementação do padrão Singleton. Nesse exemplo nota-se a presença do synchronized, isso se deve pois se tirássemos o synchronized e tentássemos criar duas instâncias da classe num determinado momento verificaríamos que isso é possível. Utilizando synchronized tem-se a certeza que o método nunca será acessado por duas threads ao mesmo tempo.

O construtor é privado evitando que essa classe seja instanciada fora dela. Assim, para podermos instanciar ou acessar uma instância da classe criou-se um atributo público e estático (da classe) que retorna através de um método estático uma única instância dessa classe. Como getInstance() é estático ele pode ser chamado de outra classe sem precisar instanciar a classe Singleton. Caso a classe já tenha sido instanciada o atributo não será nulo, assim retorna-se a única instância já criada.

Também existem outras abordagens para a criação da instância da classe Singleton. Por exemplo, se uma determinada classe Singleton sempre é criada e usada, pode-se usar o código abaixo:

**Listagem 2**: Exemplo de implementação do Padrão Singleton instanciando direto.

```
public class Singleton {

	private static Singleton uniqueInstance = new Singleton();

	private Singleton() {
	}

	public static Singleton getInstance() {
		return uniqueInstance;
	}
}
```

Prefira a abordagem da implementação acima caso o método getInstance() também seja muito acessado, pois usar synchronized pode diminuir a performance da aplicação. Note que a instância da classe será SEMPRE criada mesmo antes de chamar getInstance().

### Vantagens do Padrão Singleton

O Padrão Singleton pode ser instanciada e usada apenas quando necessário, diferentemente se criássemos uma variável global em que o objeto é sempre criado quando o aplicativo é inicializado e poderá estar usando recursos que não são necessários neste momento. O padrão Singleton define um ponto único de acesso global sendo inclusive muito mais de gerenciar a criação e utilização da instância.

### Conclusão

O Padrão Singleton é utilizado quando necessita-se de um ponto único para criação de uma instância de classe e quando precisamos de apenas uma instância de uma classe. O Padrão Singleton é utilizado em diversos aplicativos e projetos de software como em Drivers que precisam de um ponto de acesso único e global para gerenciar diversos recursos. Tem-se diversas formas de implementar o padrão Singleton e deve-se optar pela implementação que melhor atende aos requisitos da aplicação.

------

**Bibliografia**

- Eric Freeman, Elisabeth Robson, Bert Bates, Kathy Sierra. Head First Design Patterns. O'Reilly Media, 2004.
- Gamma, E., Helm, R., Johnson, R., Vlissides, J. Design Patterns: Elements of Reusable Object-Oriented Software. Addison Wesley, 2010.