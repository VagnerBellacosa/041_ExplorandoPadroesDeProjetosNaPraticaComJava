# Padrão de Projeto Facade em Java

## Veja neste artigo os conceitos fundamentais e o funcionamento do Padrão de Projeto Facade. Será apresentado um exemplo de implementação prática do padrão em linguagem Java.

### Introdução

Padrões de Projetos fazem parte da tecnologia avançada de orientação a objetos e estão sendo incorporados por ferramentas de análise orientada a objetos, bem como livros, artigos, cursos e seminários. Grupos de estudo sobre padrões são abundantes e sugerem que as pessoas aprendam Padrões de Projetos somente depois de terem dominado práticas básicas de orientação a objetos. Os Padrões de Projeto são modelos de como resolver o problema do qual trata, podendo ser usados em diferentes situações.

[Os Padrões de Projetos para software orientado a objetos](http://www.devmedia.com.br/curso/padroes-de-projeto-em-java/25) estão documentados no livro "Design Patterns: Elements of Reusable Object-Oriented Software" que contém um catálogo com 23 padrões de projetos (Design Patterns) orientados a software. A ideia dos autores do livro era documentar problemas recorrentes que aconteciam nos softwares aplicando a ideia de padrões de projeto a projetos de softwares, descrevendo uma estrutura para catalogar e descrever padrões de projeto, catalogar 23 padrões, entre outros.

Neste artigo será descrito [o Padrão de Projeto Facade](http://www.devmedia.com.br/design-patterns-facade/19757) o qual será mais detalhado nas seções subsequentes do artigo.

### Funcionamento

O Padrão de Projeto Facade oculta toda a complexidade de uma ou mais classes através de uma Facade (Fachada). A intenção desse Padrão de Projeto é simplificar uma interface. Existem outros dois Padrões de Projetos ([Decorator](http://www.devmedia.com.br/padrao-de-projeto-decorator-em-java/26238) e [Adapter](http://www.devmedia.com.br/padrao-de-projeto-adapter-em-java/26467)) já discutidos em outros artigos que possuem similaridades com o Padrão Facade, porém existem diferenças em relação a este padrão, como será visto mais adiante.

Com o Padrão Facade podemos simplificar a utilização de um subsistema complexo apenas implementando uma classe que fornece uma interface única e mais razoável, porém se desejássemos acessar as funcionalidades de baixo nível do sistema isso seria perfeitamente possível. É importante ressaltar que o padrão Facade não “encapsula” as interfaces do sistema, o padrão Facade apenas fornece uma interface simplificada para acessar as suas funcionalidades. Imagine que existe um sistema com diversas classes contendo diversos métodos e tenhamos que agrupar todas essas classes chamando diversos métodos para realizar uma determinada operação. Tendo uma Facade precisaríamos apenas construir um método que agrupe todas essas classes e chame todos esses métodos. Assim, quando usuário quiser fazer essa operação ele chamaria apenas a Facade que realizaria essa operação, simplificando muito todo o processo com uma simples interface. Vale ressaltar que isso não significa que uma Facade não tenha também funcionalidades próprias, ou seja, que tenha a sua própria inteligência e também utilize o subsistema. Um subsistema pode ter diversos Facades.

A definição oficial do padrão Facade é: “O Padrão Facade fornece uma interface unificada para um conjunto de interfaces em um subsistema. O Facade define uma interface de nível mais alto que facilita a utilização do subsistema”.

O Diagrama de classe abaixo mostra mais detalhes sobre o funcionamento do padrão Facade.

![Diagrama de classe do Padrão Facade](http://videos.web-03.net/artigos/Higor_Medeiros/PadraoFacade_Java/PadraoFacade_Java1.jpg)

**Figura 1:** Diagrama de classe do Padrão Facade

No diagrama de classe acima tem-se o Client que é quem acessa a Facade que, por sua vez, é uma interface simplificada do subsistema, sendo esta unificada e fácil de ser utilizada pelo cliente. Abaixo da Facade tem-se as classes do sistema que podem ser chamados diretamente, mas estão sendo agrupados na Facade.

### Exemplo de Implementação

Segue abaixo um exemplo de implementação em Java utilizando o Padrão Facade.

**Listagem 1:** Exemplo de implementação do Padrão Facade

```
public class Cpu {

	public void start() {
		System.out.println("inicialização inicial");
	}
	public void execute() {
		System.out.println("executa algo no processador");
	}
	public void load() {
		System.out.println("carrega registrador");
	}
	public void free() {
		System.out.println("libera registradores");
	}
}

public class Memoria {
	public void load(int position, String info) {
		System.out.println("carrega dados na memória");
	}
	public void free(int position, String info) {
		System.out.println("libera dados da memória");
	}
}

public class HardDrive {
	public void read(int startPosition, int size) {
		System.out.println("lê dados do HD");
	}
	public void write(int position, String info) {
		System.out.println("escreve dados no HD");
	}
}

public class ComputadorFacade {
	private Cpu cpu = null;
	private Memoria memoria = null;
	private HardDrive hardDrive = null;

	public ComputadorFacade(Cpu cpu,
					Memoria memoria,
					HardDrive hardDrive) {
		this.cpu = cpu;
		this.memoria = memoria;
		this.hardDrive = hardDrive;
	}

	public void ligarComputador() {
		cpu.start();
		String hdBootInfo = hardDrive.read(BOOT_SECTOR, SECTOR_SIZE);
		memoria.load(BOOT_ADDRESS, hdBootInfo);
		cpu.execute();
		memoria.free(BOOT_ADDRESS, hdBootInfo);
	}
}
```

No exemplo acima podemos notar a quantidade de classes e métodos envolvidos quando precisamos inicializar o computador. Toda essa complexidade é exposta ao cliente que poderia chamar todas essas classes e cada um dos métodos das classes para realizar a tarefa de inicializar o computador. No entanto, ao usar uma Facade encapsulamos essa complexidade oferecendo uma interface simples e unificada ao cliente evitando acoplamento e complexidade. Apenas chamando o método ligarComputador() da classe ComputadorFacade tem-se uma interface simples que diz o que ela faz exatamente, sem expor a complexidade envolvida na operação.

Nota-se que todas as chamadas que estão no Facade poderiam ser feitas uma a uma no cliente, porém isso gera muito acoplamento e complexidade para o cliente, por isso a Facade simplifica e unifica esse conjunto de classes que gera muita complexidade.

### Vantagens de Usar o Padrão Facade

O Padrão Facade nos permite desconectar a implementação do cliente de qualquer subsistema. Assim, se quiséssemos acrescentar novas funcionalidades no subsistema seria necessário apenas alterar a Facade ao invés de alterar diversos pontos do sistema. Além disso, o padrão Facade simplifica uma interface tornando-a muito mais simples e unifica um conjunto de classes mais complexas que pertencem a um subsistema.

### Conclusão

O Padrão Facade é utilizado quando precisamos simplificar e unificar uma interface grande ou um conjunto complexo de interfaces. Uma das vantagens do padrão Facade é desconectar o cliente de um subsistema complexo, conforme pode ser visto no diagrama de classes. Um sistema pode ter diversos Facades simplificando diversos pontos do programa.

### Bibliografia

- Eric Freeman, Elisabeth Robson, Bert Bates, Kathy Sierra. Head First Design Patterns. O'Reilly Media, 2004.
- Gamma, E., Helm, R., Johnson, R., Vlissides, J. Design Patterns: Elements of Reusable Object-Oriented Software. Addison Wesley, 2010.